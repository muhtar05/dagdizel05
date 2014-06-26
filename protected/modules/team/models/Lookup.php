<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 09.10.13
 * Time: 12:16
 * To change this template use File | Settings | File Templates.
 */
class Lookup extends CActiveRecord
{

    private static $_items = array();

    public static function model($className =__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{lookup}}';
    }


    public static function items($type)
    {
         if (!isset(self::$_items[$type]))
             self::loadItems($type);
         return self::$_items[$type];
    }


    protected static function loadItems($type)
    {
        self::$_items[$type]=array();

        $models=self::model()->findAll(array(
            'condition'=>'type=:type',
            'params'=>array(':type'=>$type),
            'order'=>'position',
        ));

        foreach($models as $model)
            self::$_items[$type][$model->code] = $model->name;

    }


}