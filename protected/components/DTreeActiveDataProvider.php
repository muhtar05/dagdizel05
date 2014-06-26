<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 02.02.14
 * Time: 1:10
 * To change this template use File | Settings | File Templates.
 */

class DTreeActiveDataProvider extends CActiveDataProvider
{
    public $childRelation = 'child_items';

    protected function fetchData()
    {
        $criteria = clone $this->getCriteria();
    }


}