<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 10.11.13
 * Time: 12:29
 * To change this template use File | Settings | File Templates.
 */

class VideoWidget extends CWidget
{
    public $limit = 2;


    public function getVideo()
    {
        $criteria = new CDbCriteria;
        $criteria->limit = $this->limit;
        $criteria->order = 'date DESC';
        $videos = Video::model()->findAll($criteria);
        return $videos;
    }

    public function run()
    {
        $this->render('videoWidget',array(
            'videos'=>$this->getVideo(),
        ));

    }

}