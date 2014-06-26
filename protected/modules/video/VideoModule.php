<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 14:08
 * To change this template use File | Settings | File Templates.
 */

class VideoModule extends Module
{

    public function init()
    {
        parent::init();
        $this->setImport(array(
            'video.models.*',
        ));

    }


    public static function rules()
    {
        return array(
            'video'=>'video/video/index',
            'video/view/<id:\d+>' => 'video/video/view',
            'video/show/id/<id:\d+>' => 'video/video/show'
        );
    }

}