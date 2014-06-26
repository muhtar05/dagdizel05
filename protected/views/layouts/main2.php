<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle;?></title>
    <link href="/favicon.png" rel="icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $this->pageKeywords; ?>" />
    <meta name="description" content="<?php echo $this->pageDescription; ?>" />

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/styletest.css" rel="stylesheet" media="screen">
    <link href="http://responsivewebinc.com/premium/lenord/css/rs-settings.css" rel="stylesheet" media="screen">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->


</head>

<body>
<div id="main">
    <!-- Container begin-->
    <div class="container">

     <!-- Header content begin-->
        <div class="header">

           <!-- Navabar wrapper-->
           <div class="navbar-wrapper">
             <div class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div class="navbar-collapse collapse">
                    <?php $this->widget('menu.components.MainMenuWidget'); ?>
                </div>
                <!--/.nav-collapse -->
             </div>
           </div>
           <!-- End Navbar wrapper-->

           <div class="col-md-7 col-sm-7 col-xs-12 logo-area" style="padding-left: 0; padding-right: 0">
               <a href="/"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png" class="img-responsive"/></a>
           </div>

           <div class="col-md-5 col-sm-5 hidden-xs search-area" style="padding-right: 0;padding-left: 0;">

                 <?php $this->widget('SearchWidget'); ?>
              </div>

        </div>
     <!-- End Header content-->

     <div class="row">
       <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-left-padding">
                            <?php $this->widget('season.components.LastMatch'); ?>
                        </div>

                        <div class="col-md-6 col-sm-6 col-left-padding">
                            <?php $this->widget('season.components.AnonsMatchWidget'); ?>
                            <?php //$this->widget('season.components.NextMatchesWidget'); ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row hidden-xs">
                <?php $this->widget('carousel.components.CarouselWidget'); ?>
            </div>


        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-sm-5">
                        <h4>Новости</h4>
                    </div>
                    <div class="col-md-6 col-sm-7 hidden-xs">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4>Таблица</h4>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h4>Видео</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">

                    <div  class="col-left-padding col-md-6 col-sm-5 col-xs-12 vertical-dashed-line">
                        <?php $this->widget('news.components.LastNewsWidget'); ?>
                        <?php $this->widget('season.components.GoalpasWidget'); ?>
                        <?php $this->widget('poll.components.PollWidget'); ?>

                    </div>

                    <div class="col-left-padding col-md-6 col-sm-7 col-xs-12 multimedia">


                        <div class="row">

                            <div class="col-md-6 col-sm-6 vertical-dashed-line" >
                                <div class="row">
                                  <?php $this->widget('season.components.TournamentWidget'); ?>
                                  <h4 style="color: #15212f; font-size: 20px;font-family: Tahoma;margin-left: 18px;">Туры</h4>
                                  <?php $this->widget('season.components.CalendarWidget'); ?>
                                  <?php $this->widget('team.components.BornDateWidget'); ?>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 ">
                                <?php $this->widget('video.components.VideoWidget'); ?>
                                <?php $this->widget('gallery.components.GalleryWidget'); ?>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="row visible-md visible-lg" style="margin-top:50px;">
            <?php $this->widget('menu.components.MainMenuWidget', array(
                'typeMenu' => 'bottomMenu',
            ));?>


        </div>


        <script src="/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(function () {

                $('.carousel').carousel({
                    interval: 5000
                });

                $(".thumbnail").hover(function (e) {
                        $('.multimedia-date').css('color', "#64abdc");
                        $('.caption a').css('color', '#fff');
                    },
                    function (e) {
                        $('.multimedia-date').css('color', "#000");
                        $('.caption a').css('color', '#000');
                    });

                $('.video-list-widget a img').each(function(i) {
                    var imgurl = getScreen($(this).attr('alt'));
                    $(this).attr('src',imgurl);
                });

                $('.video-list-widget img').each(function(i) {
                    var imgurl = getScreen($(this).attr('alt'));
                    $(this).attr('src',imgurl);
                });

            });
            function getScreen( url, size )
            {
                if(url === null){ return ""; }

                size = (size === null) ? "big" : size;
                var vid;
                var results;

                results = url.match("[\\?&]v=([^&#]*)");
                vid = ( results === null ) ? url : results[1];

                if(size == "small"){
                    return "http://img.youtube.com/vi/"+vid+"/2.jpg";
                }else {
                    return "http://img.youtube.com/vi/"+vid+"/0.jpg";
                }
            }
        </script>

        <?php if (!((Yii::app()->controller->id === 'site') && (Yii::app()->controller->action->id === 'index'))): ?>
            <script type="text/javascript">
                $(function(){
                    $("#main").css("background-position",'0 136px');
                });
            </script>
        <?php endif;?>



    </div>
</div>

</body>
</html>
