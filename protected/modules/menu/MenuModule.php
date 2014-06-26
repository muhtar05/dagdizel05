<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 0:26
 * To change this template use File | Settings | File Templates.
 */
class MenuModule extends Module
{

    public function init()
    {
        parent::init();
        $this->setImport(array(
           'menu.models.*',
        ));

    }

    public static function rules()
    {
        return array();
    }

}