<?php

/**
 * Created by JetBrains PhpStorm.
 * User: developer
 * Date: 17.01.13
 * Time: 14:18
 * To change this template use File | Settings | File Templates.
 */


class ImageCachedResolutionBehavior extends CActiveRecordBehavior
{
   // public $imageField = 'img';
    public function findIMGByResolution($resolution, $master = null, $crop = false)
    {

        if (!file_exists("cache".$this->getOwner()->getPhotoPath()."/".$resolution."_".$this->getOwner()->getPhotoName()))
        {
            $pathToOriginalIMG = substr($this->getOwner()->getPhotoSrc(), 1); // удаляем первый "/"

            if(is_file($pathToOriginalIMG))
            {
               if (!file_exists($pathToOriginalIMG))
                   return false;
            }
            else {
                   return false;
            }

            $resolution = strtolower($resolution);
            list($width, $height) = explode("x", $resolution);

            // Создаем директорию для кеша
            CDirectory::createDir("cache".$this->getOwner()->getPhotoPath());

            $image = Yii::app()->image->load($pathToOriginalIMG);

            $height = ($height == 'null' ? null : $height);
            $cropWidth = $width;
            $cropHeight = (empty($height) ? $width : $height );

            $IMGmaster = ($master == 'height' ? Image::HEIGHT : ($master == 'width' ? Image::WIDTH : Image::AUTO ) ) ;
            if ($crop)
                $image->resize($width, $height, $IMGmaster)->crop($crop, $crop)->quality(100);
            else
                $image->resize($width, $height, $IMGmaster)->quality(100);

            $imageName = $resolution."_".$this->getOwner()->getPhotoName();

            $image->save(Yii::app()->basePath."/../cache".$this->getOwner()->getPhotoPath() . "/" . $imageName);
            //$image->waterMark('images/signature.png', "cache/".$this->getOwner()->getPhotoSrc()."/" . $imageName);

            return "/cache".$this->getOwner()->getPhotoPath()."/" . $resolution."_".$this->getOwner()->getPhotoName();
        } else {
            return "/cache".$this->getOwner()->getPhotoPath()."/" . $resolution."_".$this->getOwner()->getPhotoName();
        }
    }

}
