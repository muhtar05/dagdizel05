<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 08.11.13
 * Time: 16:55
 * To change this template use File | Settings | File Templates.
 */

class AnonsMatchWidget extends CWidget
{
    /**
     *  Получаем текущий тур
     *
     */
    private function getAnonsMatch()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date>NOW()';
        $criteria->order = 'date ASC';
        $criteria->limit = 1;
        $anonsMatch = Match::model()->find($criteria);
        return $anonsMatch;
    }

    public function run()
    {
        $anonsMatch = $this->getAnonsMatch();
        if(empty($anonsMatch))
            return false;
        $teamHomeInfo = Teams::model()->findByPk($anonsMatch->team_home);
        $teamGuestInfo = Teams::model()->findByPk($anonsMatch->team_guest);
        $this->render('anonsMatchWidget',array(
            'anonsMatch'=>$anonsMatch,
            'teamHomeInfo'=>$teamHomeInfo,
            'teamGuestInfo'=>$teamGuestInfo,
        ));
    }



}