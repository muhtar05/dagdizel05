<?php

/**
 * This is the model class for table "{{gallery_photo}}".
 *
 * The followings are the available columns in table '{{gallery_photo}}':
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $pos
 * @property integer $gallery_id
 */
class GalleryPhoto extends CActiveRecord
{

    const UPLOAD_DIR = 'images/galleryPhoto';

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{gallery_photo}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gallery_id', 'required'),
            array('pos, gallery_id', 'numerical', 'integerOnly' => true),
            array('name, img', 'length', 'max' => 255),
            array('name','safe'),
            array('img', 'file', 'types' => 'jpg,jpeg,png,gif', 'allowEmpty' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, img, pos, gallery_id', 'safe', 'on' => 'search'),
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
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название',
            'img' => 'Фото',
            'pos' => 'Pos',
            'gallery_id' => 'Галерея',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('img', $this->img, true);
        $criteria->compare('pos', $this->pos);
        $criteria->compare('gallery_id', $this->gallery_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return GalleryPhoto the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


//    protected function beforeSave()
//    {
//        if (parent::beforeSave()) {
//
//                if (!$this->isNewRecord) {
//                    $image = CUploadedFile::getInstance($this, 'img');
//                    if ($image) {
//                    $this->deletePhoto();
//                    $path = time() . rand(0, 100) . '.' . $image->getExtensionName();
//                    $this->img = $path;
//                    $result = $image->saveAs(Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $this::UPLOAD_DIR . DIRECTORY_SEPARATOR . $this->gallery_id . DIRECTORY_SEPARATOR . $path);
//
//                }
//            }
//
//            return true;
//        } else {
//            return false;
//        }
//    }

    private function deletePhoto()
    {
        $oldPhoto = GalleryPhoto::model()->findByPk($this->id)->img;
        if(strlen(trim($oldPhoto))>0)
        {
          if ($handle = opendir("cache" . $this->getPhotoPath())) {
            while (false !== ($entry = readdir($handle)))
                if (strstr($entry, $oldPhoto)) {
                    @unlink("cache" . $this->getPhotoPath() . "/" . $entry);
                }
            closedir($handle);
            $imgPath = substr($this->getPhotoSrc(), 1);
            @unlink($imgPath . $oldPhoto);
          }
        }
    }

    public function getPhotoPath()
    {
        return Yii::app()->baseUrl . '/upload/' . self::UPLOAD_DIR . "/" . $this->gallery_id;
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
