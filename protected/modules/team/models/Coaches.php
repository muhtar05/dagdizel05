<?php

/**
 * This is the model class for table "{{coaches}}".
 *
 * The followings are the available columns in table '{{coaches}}':
 * @property integer $id
 * @property string $fio
 * @property string $description
 * @property string $info
 * @property string $img
 * @property integer $coach_team
 */
class Coaches extends CActiveRecord
{
    const UPLOAD_DIR = 'images/team/coaches';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{coaches}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fio, description, info', 'required'),
			array('fio, img', 'length', 'max'=>255),
            array('img','file','types'=>'jpg,gif,png,jpeg','allowEmpty'=>true),
            array('born_date', 'safe'),

			array('id, fio, description, info, img', 'safe', 'on'=>'search'),

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
     * @return array behaviors rules
     */
    public function behaviors()
    {
        return array(
            'imageUploadBehavior'=>array(
                'class'=>'ImageUploadBehavior',
                'uploadPath'=>'upload/'.self::UPLOAD_DIR,
                'imageField'=>'img',
            ),

            'imageCachedResolution' => array(
                'class' => 'application.behaviors.ImageCachedResolutionBehavior',
            ),

        );
    }


    /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fio' => 'ФИО',
			'description' => 'Описание',
			'info' => 'Биография',
			'img' => 'Img',
            'born_date'=>'Год рождения',
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
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('coach_team',$this->coach_team);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Coaches the static model class
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
