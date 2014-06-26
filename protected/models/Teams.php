<?php

/**
 * This is the model class for table "{{teams}}".
 *
 * The followings are the available columns in table '{{teams}}':
 * @property integer $id
 * @property string $name
 * @property string $fullname
 * @property string $logo
 */
class Teams extends CActiveRecord
{
    const UPLOAD_DIR = 'images/season/teams/';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{teams}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, fullname', 'required'),
			array('name, fullname, logo', 'length', 'max'=>255),
            array('logo','file','types'=>'jpg,jpeg,png,gif','allowEmpty'=>true),
			array('id, name, fullname, logo', 'safe', 'on'=>'search'),
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



    public function behaviors()
    {
        return array(
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
			'name' => 'Name',
			'fullname' => 'Fullname',
			'logo' => 'Logo',
		);
	}

    /**
     * Get all teams
     * @return array
     */
    public static function getAllTeams()
    {
        return self::model()->findAll();
    }

    /**
     * Get count teams
     * @return int
     */
    public static function getCountTeams()
    {
        return count(self::getAllTeams());
    }

    /**
     * Get total of tours
     * @return array
     */
    public static function getTours()
    {
        $tours = array();
        for($i=1;$i<(self::getCountTeams()*2-1);$i++)
        {
            $tours[$i] = $i;
        }
        return $tours;
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>50,
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teams the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function beforeSave()
    {
        if (parent::beforeSave())
        {
            $image = CUploadedFile::getInstance($this,'logo');
            if ($image)
            {
                if(!$this->isNewRecord)
                    $this->deleteLogo();

                $path = time().rand(0,100).'.'.$image->getExtensionName();
                $this->logo = $path;
                $image->saveAs(Yii::getPathOfAlias('webroot.upload').DIRECTORY_SEPARATOR.$this::UPLOAD_DIR.DIRECTORY_SEPARATOR.$path);
            }
            return true;
        }
        else {
            return false;
        }
    }


    private function deleteLogo()
    {
        $oldPhoto = Teams::model()->findByPk($this->id)->logo;
        $path = Yii::getpathOfAlias('webroot.upload').DIRECTORY_SEPARATOR.self::UPLOAD_DIR.$oldPhoto;
        if(file_exists($path))
        {
            @unlink($path);
        }
    }


    public function getLogo()
    {
        $path = '/upload/images/season/teams/'.$this->logo;
        return $path;
    }

    public function getPhotoPath()
    {
        return Yii::app()->baseUrl . '/upload/' . self::UPLOAD_DIR . "/";
    }

    public function getPhotoName()
    {
        return $this->logo;
    }

    public function getPhotoSrc()
    {
        return $this->getPhotoPath() . "/" . $this->getPhotoName();
    }

}
