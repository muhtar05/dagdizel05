<div class="navbar navbar-bottom">
<div class="navbar-collapse collapse">
<ul class="nav nav-justified nav-bottom-menu">
    <?php $item = 0;?>
    <?php foreach($parentMenu as $menu):?>
        <?php
            $subMenuItems = $this->getSubMenu($menu->id);
            $count = count($subMenuItems);
        ?>
       <?php if ($medium == $item):?>

            <li style="position:relative;" class="logo-bottom-li">
                <div class="logo-bottom">
                     <img src="/images/logo-bottom.png" />
                </div>
            </li>
            <li></li>

       <?php endif;?>
            <li>
                <a href="<?php echo $menu->href;?>">
                    <?php echo $menu->title;?></a>
                <?php if($count>0):?>
                  <ul class="bottom-dropdown-menu">
                    <?php foreach($subMenuItems as $submenu):?>
                        <li><a href="#"><?php echo $submenu->title;?></a></li>
                    <?php endforeach;?>
                  </ul>
                <?php endif;?>
            </li>

        <?php $item++;?>
    <?php endforeach;?>
</ul>
</div>
    </div>
