<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 03.10.13
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */

class DModuleUrlRulesBehavior extends CBehavior
{
    public $beforeCurrentModule = array();
    public $afterCurrentModule = array();

    public function events()
    {
        return array_merge(parent::events(),array(
             'onBeginRequest'=>'beginRequest',
        ));
    }

    public function beginRequest()
    {
        $module = $this->_getModuleName();
        $list = array_merge(
            $this->beforeCurrentModule,
            array($module),
            $this->afterCurrentModule
        );

        foreach($list as $name)
            DUrlRulesHelper::import($name);

    }

    protected function _getModuleName()
    {
        $route = Yii::app()->getRequest()->getPathInfo();
        $domains = explode('/',$route);
        $moduleName = array_shift($domains);
        return $moduleName;
    }

}