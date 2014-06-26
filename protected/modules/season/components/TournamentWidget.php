<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 08.11.13
 * Time: 12:30
 * To change this template use File | Settings | File Templates.
 */

class TournamentWidget extends CWidget
{

    public function run()
    {
        $season_id = SeasonYear::model()->find(array(
                      'condition'=>'current='.SeasonYear::SEASON_YEAR_CURRENT_ACTIVE
         ))->id;
        $tournaments = Tournament::model()->with('teams')->findAll(array(
                                           'condition'=>'season_id='.$season_id,
                                           'order'=>'place',


        ));

        $this->render('tournament_tpl',array(
            'tournaments'=>$tournaments,
        ));
    }

}