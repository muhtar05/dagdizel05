<?php

class CalendarWidget extends CWidget
{
    /**
     *  Получаем текущий тур
     *
     */
    private function getCurrentTour()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'date<=NOW()';
        $criteria->order = 'date DESC';
        $criteria->limit = 1;
        $currentTourInfo = Calendar::model()->find($criteria);
        if ($currentTourInfo !== null)
            return $currentTourInfo->tour;
    }


    private function getCalendarTours()
    {
        $season_id = SeasonYear::model()->find(array(
            'condition'=>'current='.SeasonYear::SEASON_YEAR_CURRENT_ACTIVE
        ))->id;

       $criteria = new CDbCriteria;
       $criteria->condition = 'season_year ='.$season_id;
       $criteria->order = 'tour ASC';
       $calendarTours = Calendar::model()->findAll($criteria);
       return $calendarTours;

    }

    public function run()
    {
       $calendarTours = $this->getCalendarTours();
       $teams = CHtml::listData(Teams::model()->findAll(),'id','name');
       $currentTour = $this->getCurrentTour();
       $tourArray = array($currentTour-1,$currentTour,$currentTour+1);
       $mainTeamId = Teams::model()->find(array('condition'=>'main=1'))->id;

       $this->render('calendarWidget',array(
           'calendarTours'=>$calendarTours,
           'teams'=>$teams,
           'currentTour'=>$currentTour,
           'tourArray'=>$tourArray,
           'mainTeamId'=>$mainTeamId
       ));

    }

}