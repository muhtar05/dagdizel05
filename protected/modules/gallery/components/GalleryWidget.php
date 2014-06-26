<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 10.11.13
 * Time: 12:29
 * To change this template use File | Settings | File Templates.
 */

class GalleryWidget extends CWidget
{
    public $limit = 2;


    public function getGallery($limit)
    {
        $criteria = new CDbCriteria;
        $criteria->limit = $this->limit;
        $criteria->order = 'create_time DESC';
        $criteria->limit = $this->limit;
        $videos = Gallery::model()->findAll($criteria);
        return $videos;
    }

    public function run()
    {
        $this->render('galleryWidget',array(
            'gallery'=>$this->getGallery($this->limit),
        ));

    }

}