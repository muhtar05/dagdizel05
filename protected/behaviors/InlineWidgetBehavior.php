<?php
/**
 * Created by PhpStorm.
 * User: Мухтар
 * Date: 22.03.14
 * Time: 21:43
 */

class InlineWidgetBehavior extends CBehavior {

    public $startBlock = '[*';
    public $endBlock = '*]';
    public $location = '';
    public $classSuffix = '';
    public $widgets = array();
    protected $_widgetToken;

    public function __construct(){
        $this->_initToken();
    }

    protected function _initToken(){
        $this->_widgetToken = md5(microtime());
    }


    public function decodeWidgets($text){
        $text = $this->_replaceBlocks($text);
        $text = $this->_clearAutoParagraphs($text);
        $text = $this->_proccessWidgets($text);
        return $text;
    }


    protected function _replaceBlocks($text){
        $text = str_replace($this->startBlock,'{'.$this->_widgetToken . ':',$text);
        $text = str_replace($this->endBlock,$this->_widgetToken.'}',$text);
        return $text;
    }

    protected function _clearAutoParagraphs($output){
        $output = str_replace('<p>'.$this->startBlock,$this->startBlock,$output);
        $output = str_replace($this->endBlock.'</p>',$this->endBlock,$output);
        return $output;
    }

    protected function _proccessWidgets($text){
        if (preg_match('|\{'.$this->_widgetToken.':.+?'.$this->_widgetToken.'\}|is',$text)){
            foreach($this->_widgets as $alias){
                $widget = $this->_getClassByAlias($alias);
                $patternWhile = '#\{'.$this->_widgetToken.':'.$widget.'(\|([^}]*?)?'.$this->_widgetToken.'\}#is';
                while(preg_match($patternWhile,$text,$p)){
                    $text = str_replace($p[0],$this->_loadWidget($alias,isset($p[2])? $p[2] : ''),$text);
                }
                return $text;
            }
        }
        return $text;
    }


    protected function _loadWidget($name,$attributes=''){
        $attrs = $this->_parseAttributes($attributes);
        $index = 'widget_'.$name.'_'.serialize($attrs);
        ob_start();
        $widgetClass = $this->_getFullClassName($name);
        $widget = Yii::app()->getWidgetFactory()->createWidget($this->owner, $widgetClass, $attrs);
        $widget->init();
        $widget->run();
        $html = trim(ob_get_clean());
        return $html;

    }


    protected function _parseAttributes($attributesString){
        $params = explode(':',$attributesString);
        $attrs = array();
        foreach($params as $param){
            if ($param){
                list($attribute,$value) = explode('=',$param);
                if ($value){
                    $attrs[$attribute] = trim($value);
                }
            }
        }
        ksort($attrs);
        return $attrs;
    }

    protected function _getFullClassName($name){
        $widgetClass = $name . $this->classSuffix;
        if ($this->_getClassByAlias($widgetClass) == $widgetClass && $this->location)
            $widgetClass = $this->location . '.' . $widgetClass;
        return $widgetClass;
    }

    protected function _getClassByAlias($alias)
    {
        $paths = explode('.', $alias);
        return array_pop($paths);
    }

} 