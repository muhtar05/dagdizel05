<?php

/**
 * This is the model class for table "{{players}}".
 *
 * The followings are the available columns in table '{{players}}':
 * @property integer $id
 * @property string $fio
 * @property string $born_date
 * @property integer $amplua_id
 * @property string $country
 * @property string $height
 * @property string $weight
 * @property string $img
 * @property string $info
 * @property string $firstname
 * @property string $lastname
 */
class Players extends CActiveRecord
{

    const AMPLUA_GOALKEEPER = 1;
    const AMPLUA_DEFENCE = 2;
    const AMPLUA_MIDFIELD = 3;
    const AMPLUA_FORWARD = 4;

    const UPLOAD_DIR = 'images/team/players';


    public $born;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{players}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('born_date,amplua_id,firstname,lastname', 'required'),
			array('amplua_id', 'numerical', 'integerOnly'=>true),
			array('fio', 'length', 'max'=>255),
			array('country', 'length', 'max'=>100),
			array('height, weight', 'length', 'max'=>20),
			array('info,team_type,born_date,fio,number, height, weight', 'safe'),
            array('img','file','types'=>'jpg,jpeg,png,gif','allowEmpty'=>true),
			array('id, fio, born_date, amplua_id, country, height, weight, img, info', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

    /**
     *
     * @return array
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
            'firstname'=>'Фамилия',
            'lastname'=>'Имя',
			'fio' => 'Fio',
			'born_date' => 'Дата рождения',
			'amplua_id' => 'Амплуа',
			'country' => 'Country',
			'height' => 'Рост',
			'weight' => 'Вес',
			'img' => 'Фото',
			'info' => 'Info',
            'number'=>'Номер игрока',
		);
	}


    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->fio = $this->firstname.' '.$this->lastname;
            return true;
        }


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
		$criteria->compare('born_date',$this->born_date,true);
		$criteria->compare('amplua_id',$this->amplua_id);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('info',$this->info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>100,
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Players the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @param $id
     * @return string
     */
    public static function getAmplua($id)
    {
        $ampluaItems = array(
                 1=>'goalkeeper',
                 2=>'defender',
                 3=>'halfback',
                 4=>'forward'
        );
        return $ampluaItems[$id];
    }


    public static function getAmpluaName($id)
    {
        $ampluaItems = Lookup::items('PlayerAmplua');
        return $ampluaItems[$id];
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
