<?php

class NextMatchesWidget extends CWidget
{

    public function getNextMatches()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date>NOW()';
        $criteria->order = 'date ASC';
        $criteria->limit = 2;
        $nextMatches = Match::model()->findAll($criteria);
        return $nextMatches;
    }

    public function run()
    {

        $this->render('nextMatchesWidget',array(
            'nextMatches'=>$this->getNextMatches(),
        ));
    }

}