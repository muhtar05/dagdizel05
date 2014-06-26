<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 07.10.13
 * Time: 14:07
 * To change this template use File | Settings | File Templates.
 */

class UserModule extends Module
{
    public function init()
    {
        parent::init();
        $this->setImport(array(
            'user.components.*',
            'user.models.*',
            'user.forms.*',
        ));
    }

    public static function rules()
    {
        return array(
            'user'=>'user/user/admin',
            'user/registration'=>'user/user/registration',

        );
    }

}
