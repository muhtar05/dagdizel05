<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $title
 * @property string $shorttext
 * @property string $text
 * @property string $tags
 * @property string $img
 * @property string $date
 * @property integer $is_main
 */
class News extends CActiveRecord
{
    const UPLOAD_DIR = 'images/news';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, shorttext, text,date', 'required'),
			array('title, img', 'length', 'max'=>255),
//	        array('date','safe'),
            array('is_main', 'numerical', 'integerOnly' => true),
            array('img', 'file', 'types' => 'jpg,jpeg,png,gif', 'allowEmpty' => true),

			array('id, title, shorttext, text, is_main, tags, img, date', 'safe', 'on'=>'search'),
		);
	}
    public function behaviors()
    {
        return array(
            // наше поведение для работы с файлом
            'imageCachedResolution' => array(
                'class' => 'application.behaviors.ImageCachedResolutionBehavior',
                // конфигурируем нужные свойства класса UploadableFileBehavior
                // ...
            ),
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
			'title' => 'Заголовок',
			'shorttext' => 'Краткое описание',
			'text' => 'Полный текст',
			'tags' => 'Тэги',
			'img' => 'Фото',
			'date' => 'Дата',
            'is_main' => 'Тип новости'
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
		$criteria->compare('shorttext',$this->shorttext,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('date',$this->date,true);
        $criteria->compare('is_main',$this->is_main);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave()
    {

        if (parent::beforeSave()) {

            $image = CUploadedFile::getInstance($this, 'img');
            if (!empty($image) && ($image instanceof CUploadedFile)) {
                if ($this->isNewRecord) {
                    $path = time() . rand(0, 100) . '.' . $image->getExtensionName();
                    $this->img = $path;
                } else {
                    $this->deletePhoto();
                    $path = time() . rand(0, 100) . '.' . $image->getExtensionName();
                    $this->img = $path;
                }
                CDirectory::createDir('upload'. DIRECTORY_SEPARATOR . $this::UPLOAD_DIR . DIRECTORY_SEPARATOR . date("Y/m/d", strtotime($this->date)));
                $result = $image->saveAs(Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $this::UPLOAD_DIR . DIRECTORY_SEPARATOR . date("Y/m/d", strtotime($this->date)) . DIRECTORY_SEPARATOR . $path);
            } else {
                $oldPhoto = News::model()->findByPk($this->id)->img;
                $this->img = $oldPhoto;
            }

            return true;
        } else {
            return false;
        }
    }

    private function deletePhoto()
    {
        $oldPhoto = News::model()->findByPk($this->id)->img;
        if (!empty($oldPhoto))
        if ($handle = @opendir("cache" . $this->getPhotoPath())) {
            while (false !== ($entry = readdir($handle)))
                if (strstr($entry, $oldPhoto)) {
                    @unlink("cache" . $this->getPhotoPath() . "/" . $entry);
                }
            closedir($handle);
            $imgPath = substr($this->getPhotoSrc(), 1);

            @unlink($imgPath . $oldPhoto);
        }
    }

    public function getPhotoPath()
    {
        return Yii::app()->baseUrl . '/upload/' . self::UPLOAD_DIR . "/" . date("Y/m/d", strtotime($this->date));
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
