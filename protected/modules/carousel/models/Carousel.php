<?php

/**
 * This is the model class for table "{{carousel}}".
 *
 * The followings are the available columns in table '{{carousel}}':
 * @property integer $id
 * @property string $title
 * @property string $img
 * @property string $description
 * @property integer $sort
 */
class Carousel extends CActiveRecord
{

    const UPLOAD_DIR = 'images/carousel';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{carousel}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,url,description', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
            array('img','file','types'=>'jpg,jpeg,png,gif','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, img, description, sort', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'img' => 'Фото',
			'description' => 'Description',
			'sort' => 'Sort',
		);
	}



    public function behaviors()
    {
        return array(

            'imageUploadBehavior'=>array(
                'class'=>'ImageUploadBehavior',
                'uploadPath'=>'upload/'.self::UPLOAD_DIR,
                'imageField'=>'img',
            ),

            // наше поведение для работы с файлом
            'imageCachedResolution' => array(
                'class' => 'application.behaviors.ImageCachedResolutionBehavior',
                // конфигурируем нужные свойства класса UploadableFileBehavior
                // ...
            ),
        );
    }



    /**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Carousel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function getPhotoPath()
    {

        return Yii::app()->baseUrl . '/upload/' . self::UPLOAD_DIR . "/";
    }

    public function getPhotoName()
    {
        return $this->img;
    }

    public function getPhotoSrc()
    {
        return $this->getPhotoPath() . "/" . $this->getPhotoName();
    }
}
