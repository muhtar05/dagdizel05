<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 07.10.13
 * Time: 14:07
 * To change this template use File | Settings | File Templates.
 */

class SeasonModule extends Module
{
    public function init()
    {
        parent::init();
        $this->setImport(array(
            'season.components.*',
            'season.models.*',
        ));
    }

    public static function rules()
    {
        return array(
            'season'=>'season/match/index',

        );
    }

}
