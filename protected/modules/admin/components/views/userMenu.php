<ul class="nav nav-list">
    <li  <?php if(Yii::app()->controller === 'default'):?> class="active" <?php endif;?>>
        <a href="/admin/default/index">
            <i class="icon-home"></i>
            <span class="menu-text"> Главная </span>
        </a>
    </li>

    <li <?php if(Yii::app()->controller->id === 'menu'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/menu/menu/admin">

            <i class="icon-edit"></i>
            <span class="menu-text"> Меню </span>
        </a>
    </li>



    <li <?php if(Yii::app()->controller->id === 'pages'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/page/page/admin">
            <i class="icon-tag"></i>
            <span class="menu-text"> Страницы </span>
        </a>
    </li>

    <li <?php if(Yii::app()->controller->id === 'news'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/news/news/admin"  >
            <i class="icon-text-width"></i>
            <span class="menu-text"> Новости </span>
        </a>
    </li>

    <li  <?php if(Yii::app()->controller->id === 'product'):?> class="active" <?php endif;?>>
        <a href="#">
            <i class="icon-tasks"></i>
            <span class="menu-text"> Команда</span>

            <ul class="submenu" style="display: block;">
                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/team/players/admin">
                        <i class="icon-double-angle-right"></i>
                        Игроки
                    </a>
                </li>

                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/team/coaches/admin">
                        <i class="icon-double-angle-right"></i>
                        Тренеры
                    </a>
                </li>

                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/team/personal/admin">
                        <i class="icon-double-angle-right"></i>
                        Персонал
                    </a>
                </li>


            </ul>
        </a>
    </li>


    <li <?php if(Yii::app()->controller->id === 'review'):?> class="active" <?php endif;?>>


            <a href="#" class="dropdown-toggle">
            <i class="icon-folder-open-alt"></i>
            <span class="menu-text"> Сезон</span>
                <b class="arrow icon-angle-down"></b>

                <ul class="submenu" style="display: block;">
                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/season/match/admin">
                        <i class="icon-double-angle-right"></i>
                        Матчи
                    </a>
                </li>

                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/season/calendar/admin">
                        <i class="icon-double-angle-right"></i>
                        Календарь
                    </a>
                </li>



                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/season/tournament/admin">
                       <i class="icon-double-angle-right"></i>
                         Итоговая турнирная таблица
                    </a>
                </li>



                <li>
                        <a href="<?php echo Yii::app()->baseUrl;?>/season/teams/admin">
                            <i class="icon-double-angle-right"></i>
                            Все команды
                        </a>
                </li>


                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/season/seasonYear/admin">
                           Сезоны
                    </a>
                </li>


                    <li>
                        <a href="<?php echo Yii::app()->baseUrl;?>/season/pasgol/admin">
                            <i class="icon-double-angle-right"></i>
                            Гол + пас
                        </a>
                    </li>

            </ul>
        </a>
    </li>


    <li <?php if(Yii::app()->controller->id === 'pictureSpread'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/gallery/gallery/admin">
            <i class="icon-picture"></i>
            <span class="menu-text"> Фотогалерея</span>
        </a>
    </li>


    <li <?php if(Yii::app()->controller->id === 'video'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/video/video/admin">
            <i class="icon-film"></i>
            <span class="menu-text"> Видеоархив</span>
        </a>
    </li>



    <li <?php if(Yii::app()->controller->id === 'question'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/poll/question/admin">
            <i class="icon-film"></i>
            <span class="menu-text"> Голосование</span>
        </a>
    </li>


    <li <?php if(Yii::app()->controller->id === 'carousel'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/carousel/carousel/admin">
            <i class="icon-camera"></i>
            <span class="menu-text"> Карусель</span>
        </a>
    </li>

    <li <?php if(Yii::app()->controller->id === 'user'):?> class="active" <?php endif;?>>
        <a href="<?php echo Yii::app()->baseUrl;?>/user/user/admin">
            <i class="icon-user"></i>
            <span class="menu-text"> Пользователи</span>
        </a>
    </li>



    <li>
        <a href="#">
            <i class="icon-book"></i>
            <span class="menu-text"> Гостевая книга</span>

            <ul class="submenu" style="display: block;">
                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/guest/post/admin">
                        <i class="icon-double-angle-right"></i>
                        Посты
                    </a>
                </li>

                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/guest/comment/admin">
                        <i class="icon-double-angle-right"></i>
                        Комментарии
                    </a>
                </li>


            </ul>
        </a>
    </li>



    <li>
        <a href="#">
            <i class="icon-book"></i>
            <span class="menu-text"> Настройки</span>

            <ul class="submenu" style="display: block;">
                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/guest/post/admin">
                        <i class="icon-double-angle-right"></i>
                        Посты
                    </a>
                </li>

                <li>
                    <a href="<?php echo Yii::app()->baseUrl;?>/admin/modules/admin">
                        <i class="icon-double-angle-right"></i>
                        Модули
                    </a>
                </li>


            </ul>
        </a>
    </li>





</ul><!--/.nav-list-->