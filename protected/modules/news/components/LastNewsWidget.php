<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 08.11.13
 * Time: 17:22
 * To change this template use File | Settings | File Templates.
 */

class LastNewsWidget extends CWidget
{

    public $count = 5;

    public function getLastNews()
    {
        $criteria = new CDbCriteria;
        $criteria->limit = $this->count;
        $criteria->order = 'date DESC';
        $news = News::model()->findAll($criteria);
        return $news;
    }

    public function run()
    {
        $this->render('lastNewsWidget',array(
            'news'=>$this->getLastNews(),
        ));

    }

}