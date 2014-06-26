<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 18.10.13
 * Time: 11:39
 * To change this template use File | Settings | File Templates.
 */

class PollModule extends Module
{
    public function init()
    {
        parent::init();
        $this->setImport(array(
            'poll.components.*',
            'poll.models.*'
        ));
    }


    public static function rules()
    {
        return array(
            'poll/choice'=>'poll/choice/index',
            'poll/<controller:\w+>/<action:\w+>'=>'poll/<controller>/<action>',
        );
    }
}