<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 31.10.13
 * Time: 0:08
 * To change this template use File | Settings | File Templates.
 */

class PageModule extends Module
{

    public function init()
    {
        parent::init();

        $this->setImport(array(
              'page.models.*',
        ));
    }

    public static function rules()
    {
        return array(
        'page/<controller:\w+>/<action:\w+>/<id:\d+>' => 'page/<controller>/<action>',
        'page/<controller:\w+>/<action:\w+>' => 'page/<controller>/<action>',
        'page/<_url:.*?>' => 'page/page/show',
        );

    }




}