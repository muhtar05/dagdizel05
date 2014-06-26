<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 12.11.13
 * Time: 13:12
 * To change this template use File | Settings | File Templates.
 */

class GoalPasWidget extends CWidget
{

    public function getGoalpas()
    {
        $goalpas = Pasgol::model()->findAll();
        return $goalpas;
    }
    public function run()
    {
        $this->render('goalpasWidget',array(
            'goalpas'=>$this->getGoalpas(),
        ));
    }
}