<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 10.11.13
 * Time: 17:44
 * To change this template use File | Settings | File Templates.
 */

class MainMenuWidget extends CWidget
{

    public $typeMenu = 'mainmenu';

    public function getParentMenu()
    {
        if($this->typeMenu === 'bottomMenu')
        {
           $menu = Menu::model()->findAll(array(
                                'condition'=>'parent_id=0 AND menu_type=2',
                               // 'order'=>'sort ASC',
           ));

        }
        else
        {
           $menu = Menu::model()->findAll(array(
                                'condition'=>'parent_id=0',
                                'order'=>'sort ASC',
           ));
        }
        return $menu;
    }


    public function getSubMenu($parent)
    {
        $subMenu = Menu::model()->findAll(array(
                                 'condition'=>'parent_id='.$parent,
                                 'order'=>'sort ASC',
        ));

        return $subMenu;
    }

    public function run()
    {
        $parentMenu = $this->getParentMenu();
        $count = count($parentMenu)+1;
        $medium = ceil($count/2)-1;
        if ($this->typeMenu === 'bottomMenu')
        {
            $this->render('bottomMenuWidget',array(
                'parentMenu'=>$parentMenu,
                'medium'=>$medium,
            ));

        }
        else {
          $this->render('mainMenuWidget',array(
            'parentMenu'=>$parentMenu,
          ));
        }
    }

}