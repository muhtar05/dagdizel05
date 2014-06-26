<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 9:01
 * To change this template use File | Settings | File Templates.
 */

class Module extends CWebModule
{

    public function init()
    {
        parent::init();
        $this->layout = 'admin.views.main';
    }

}