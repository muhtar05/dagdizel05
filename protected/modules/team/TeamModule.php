<?php
/**
 * User: Мухтар
 * Date: 03.10.13
 * Time: 12:35
 */

class TeamModule extends Module
{
    public function init()
    {
        parent::init();

        $this->setImport(array(
            'team.components.*',
            'team.models.*'
        ));
    }


    public static function rules()
    {
         return array(
             'team/'=>'team/players/index',
             'team/<controller:\w+>/<action:\w+>'=>'team/<controller>/<action>',

         );
    }

}