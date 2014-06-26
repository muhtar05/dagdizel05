<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 10.11.13
 * Time: 12:23
 * To change this template use File | Settings | File Templates.
 */

class CarouselWidget extends CWidget
{
    public $limit = 4;

    private function getCarouselItems()
    {
        $criteria = new CDbCriteria;
        $criteria->limit = $this->limit;
        $carousel = Carousel::model()->findAll($criteria);
        return $carousel;

    }

    public function run()
    {
        $this->render('carouselWidget',array(
            'carouselItems'=>$this->getCarouselItems(),
        ));
    }

}