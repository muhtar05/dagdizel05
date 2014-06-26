<?php
/**
 * User: Мухтар
 * Date: 03.10.13
 * Time: 12:00
 */


class NewsModule extends Module
{
    public function init()
    {
         parent::init();
         $this->setImport(array(
             'news.components.*',
             'news.models.*',
         ));
    }

    public static function rules()
    {
        return array(
            'news'=>'news/news/index',
            'news/<id:\d+>'=>'news/news/view',
            'news/show/<id_altTitle:\w+>' => 'news/news/show'

        );
    }
}