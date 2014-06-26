<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 08.11.13
 * Time: 17:21
 * To change this template use File | Settings | File Templates.
 */

class LastMatch extends CWidget
{
    /**
     * @return mixed
     */
    public function getLastMatch()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date<NOW()';
        $criteria->order = 'date DESC';
        $criteria->limit = 1;
        $lastMatch = Match::model()->find($criteria);
        return $lastMatch;

    }


    public function run()
    {
        $lastMatch = $this->getLastMatch();
        if($lastMatch === null )
        {
            return false;

        }
        $teamHomeInfo = Teams::model()->findByPk($lastMatch->team_home);
        $teamGuestInfo = Teams::model()->findByPk($lastMatch->team_guest);
        $this->render('lastMatch',array(
            'lastMatch'=>$lastMatch,
            'teamHomeInfo'=>$teamHomeInfo,
            'teamGuestInfo'=>$teamGuestInfo,
        ));
    }



}