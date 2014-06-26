<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 19.11.13
 * Time: 23:40
 * To change this template use File | Settings | File Templates.
 *
 *
 * Поведение для загрузки файлов для модели
 *
 */

class ImageUploadBehavior extends CActiveRecordBehavior
{
    /* Путь куда необходимо загрузить файл*/
    public $uploadPath = '';
    /* Поле в модели. По умолчанию img*/
    public $imageField = 'img';

    public function beforeSave($event)
    {
        $owner = $this->owner;
        $image = CUploadedFile::getInstance($this->owner,$this->imageField);
        if(!$this->owner->isNewRecord)
        {
            $this->owner->{$this->imageField} = $owner::model()->findByPk($owner->id)->{$this->imageField};
        }
        if (null != $image && ($image instanceof CUploadedFile))
        {
            if(!$this->owner->isNewRecord)
                 $this->deleteImage();
            $imageName = time().rand(0,100).'.'.$image->getExtensionName();
            $path = Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.$this->uploadPath.DIRECTORY_SEPARATOR.$imageName;
            $image->saveAs($path);

            $this->owner->{$this->imageField} = $imageName;
        }

    }

    public function beforeDelete($event)
    {
        $this->deleteImage();

    }

    /*
     *   Удаление фотографии
     */
    public function deleteImage()
    {
        $pathImage = $this->uploadPath.'/'.$this->owner->{$this->imageField};
        @unlink($pathImage);
    }

}