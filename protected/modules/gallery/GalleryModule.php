<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 12:59
 * To change this template use File | Settings | File Templates.
 */

class GalleryModule extends Module
{

    public function init()
    {
        parent::init();
        $this->setImport(array(
            'gallery.models.*',
        ));
    }


    public static function rules()
    {
        return array(
            'gallery'=>'gallery/gallery/index',
            'gallery/view/<id:\d+>' => 'gallery/gallery/view'
        );
    }

}