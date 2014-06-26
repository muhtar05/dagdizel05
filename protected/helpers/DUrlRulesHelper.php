<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 03.10.13
 * Time: 17:35
 * To change this template use File | Settings | File Templates.
 */

/**
 * Class DUrlRulesHelper
 * This is class for import url rules which module
 */
class DUrlRulesHelper
{
    /**
     * @var
     */
    protected static $data = array();

    /**
     * @param $moduleName
     */
    public static function import($moduleName)
    {
        if($moduleName && Yii::app()->hasModule($moduleName))
        {
            if (!isset(self::$data[$moduleName]))
            {
                $class = ucfirst($moduleName).'Module';
                Yii::import($moduleName . '.' . $class);
                if (method_exists($class,'rules'))
                {
                    $urlManager = Yii::app()->getUrlManager();
                    $urlManager->addRules(call_user_func($class.'::rules'));
                }
                self::$data[$moduleName] = true;
            }
        }

    }





}