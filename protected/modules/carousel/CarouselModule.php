<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 14:19
 * To change this template use File | Settings | File Templates.
 */

class CarouselModule extends Module
{

    public function init()
    {
        parent::init();
        $this->setImport(array(
           'carousel.components.*',
           'carousel.models.*',
        ));

    }

    public static function rules()
    {
        return array();
    }

}