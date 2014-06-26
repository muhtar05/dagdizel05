<ul class="nav nav-justified nav-menu-main">
    <?php foreach($parentMenu as $menu):?>
        <?php
        $subMenuItems = $this->getSubMenu($menu->id);
        $count = count($subMenuItems);
        ?>
        <li <?php if($count>0):?> class="dropdown" <?php endif;?> >
            <a href="<?php echo Yii::app()->baseUrl.$menu->href;?>" <?php if($count>0):?>class="dropdown-toggle" data-toggle="dropdown" <?php endif;?>>
                <?php echo $menu->title;?>
<!--              --><?php //if($count >0):?><!----><?php //endif;?>
            </a>
            <?php if($count>0):?>
              <ul class="dropdown-menu">
                <?php foreach($this->getSubMenu($menu->id) as $submenu):?>
                   <li><a href="<?php echo Yii::app()->baseUrl.$submenu->href;?>"><?php echo $submenu->title;?></a>
                
                   </li>
                <?php endforeach;?>
              </ul>
            <?php endif;?>
        </li>
    <?php endforeach;?>

</ul>
