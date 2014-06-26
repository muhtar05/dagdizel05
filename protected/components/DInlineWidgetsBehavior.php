<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 07.10.13
 * Time: 16:09
 * To change this template use File | Settings | File Templates.
 */

class DInlineWidgetsBehavior extends CBehavior
{
    public $startBlock = '[*';
    public $endBlock = '*]';
    public $location = '';
    public $classSuffix = '';
    public $widgets = array();
    protected $_widgetToken;

    public function __construct()
    {
        $this->_initToken();
    }

    public function decodeWidgets($text)
    {
        $text = $this->_clearAutoParagraphs($text);
        $text = $this->_replaceBlocks($text);
        $text = $this->_processWidgets($text);
        return $text;
    }

    protected function _initToken()
    {
        $this->_widgetToken = md5(microtime());
    }

}