<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 8:55
 * To change this template use File | Settings | File Templates.
 */

class AdminModule extends Module
{
    public function init()
    {
        parent::init();
        $this->setImport(array(
            'admin.components.*',
            'admin.models.*',
        ));
    }


    public static function rules()
    {
        return array(
           'admin/'=>'admin/default/index',
           'admin/modules'=>'admin/modules/admin',
        );
    }

}