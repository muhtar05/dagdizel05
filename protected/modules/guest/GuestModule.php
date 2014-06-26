<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 18.10.13
 * Time: 11:47
 * To change this template use File | Settings | File Templates.
 */

class GuestModule extends Module
{
    public function init()
    {
        parent::init();
        $this->setImport(array(
            'guest.components.*',
            'guest.models.*'
        ));

    }

    public static function rules()
    {
        return array(
            'guest'=>'guest/post/index',
        );
    }
}