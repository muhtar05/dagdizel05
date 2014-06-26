<?php Yii::app()->clientScript->registerCoreScript('jquery');?>


<style>
    .rg-image-wrapper{
        position:relative;
        padding:20px 30px;
        background:#0479bd;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        min-height:20px;
    }
    .rg-image{
        position:relative;
        text-align:center;
        line-height:0px;
    }
    .rg-image img{
        max-height:100%;
        max-width:100%;
    }
    .rg-image-nav a{
        position:absolute;
        top:0px;
        left:0px;
        background:#35317e url(/images/nav.png) no-repeat -20% 50%;;
        width:28px;
        height:100%;
        text-indent:-9000px;
        cursor:pointer;
        opacity:0.3;
        outline:none;
        -moz-border-radius: 10px 0px 0px 10px;
        -webkit-border-radius: 10px 0px 0px 10px;
        border-radius: 10px 0px 0px 10px;
    }
    .rg-image-nav a.rg-image-nav-next{
        right:0px;
        left:auto;
        background-position:115% 50%;
        -moz-border-radius: 0px 10px 10px 0px;
        -webkit-border-radius: 0px 10px 10px 0px;
        border-radius: 0px 10px 10px 0px;
    }
    .rg-image-nav a:hover{
        opacity:0.8;
    }
    .rg-caption {
        text-align:center;
        margin-top:15px;
        position:relative;
    }
    .rg-caption p{
        font-size:11px;
        letter-spacing:2px;
        font-family: 'Trebuchet MS', 'Myriad Pro', Arial, sans-serif;
        line-height:16px;
        padding:0 15px;
        text-transform:uppercase;
    }
    .rg-view{
        height:30px;
    }
    .rg-view a{
        display:block;
        float:right;
        width:16px;
        height:16px;
        margin-right:3px;
        background:#464646 url(/images/views.png) no-repeat top left;
        border:3px solid #464646;
        opacity:0.8;
    }
    .rg-view a:hover{
        opacity:1.0;
    }
    .rg-view a.rg-view-full{
        background-position:0px 0px;
    }
    .rg-view a.rg-view-selected{
        background-color:#6f6f6f;
        border-color:#6f6f6f;
    }
    .rg-view a.rg-view-thumbs{
        background-position:0px -16px;
    }
    .rg-loading{
        width:46px;
        height:46px;
        position:absolute;
        top:50%;
        left:50%;
        background:#000 url(/images/ajax-loader.gif) no-repeat center center;
        margin:-23px 0px 0px -23px;
        z-index:100;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        opacity:0.7;
    }

        /* Elastislide Style */
    .es-carousel-wrapper{
        background: #0479bd;
        padding:10px 27px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        position:relative;
        -moz-box-shadow:0px 1px 3px rgba(0, 0, 0, 0.9);
        -webkit-box-shadow:0px 1px 3px rgba(0, 0, 0, 0.9);
        box-shadow:0px 1px 3px rgba(0, 0, 0, 0.9);
        position:relative;
        margin-bottom:20px;
    }
    .es-carousel{
        overflow:hidden;
        /*background:#000;*/
    }
    .es-carousel ul{
        display:none;
        padding:0;
        margin: 0;
    }
    .es-carousel ul li{
        height:100%;
        float:left;
        display:block;
    }
    .es-carousel ul li a{
        display:block;
        border-style:solid;
        border-color:#222;
        opacity:0.8;
        -webkit-touch-callout:none;
        /* option */
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }
    .es-carousel ul li.selected a{
        border-color:#fff;
        opacity:1.0;
    }
    .es-carousel ul li a img{
        display:block;
        border:none;
        max-height:100%;
        max-width:100%;
    }
    .es-nav span{
        position:absolute;
        top:50%;
        left:8px;
        background:transparent url(/images/nav_thumbs.png) no-repeat top left;
        width:14px;
        height:26px;
        margin-top:-13px;
        text-indent:-9000px;
        cursor:pointer;
        opacity:0.8;
    }
    .es-nav span.es-nav-next{
        right:8px;
        left:auto;
        background-position:top right;
    }
    .es-nav span:hover{
        opacity:1.0;
    }
</style>


<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Фото'=>array('index'),
	$model->name,
);
?>



<div id="rg-gallery" class="rg-gallery">

    <div class="rg-thumbs">
        <!-- Elastislide Carousel Thumbnail Viewer -->
        <div class="es-carousel-wrapper">
            <div class="es-nav">
                <span class="es-nav-prev">Previous</span>
                <span class="es-nav-next">Next</span>
            </div>
            <div class="es-carousel">
                <ul>
                    <?php foreach($model->gallery as $gallery):?>
                    <li><a href="#"><img src="<?php echo $gallery->findIMGByResolution('120xnull', 'width', '65');?>" data-large="<?php echo $gallery->findIMGByResolution('800xnull', 'width');?>" data-description="<?php echo $gallery->name; ?>" /></a>
                    </li>
                    <?php endforeach;?>
                 </ul>
            </div>
            <div class="es-nav">
                <span class="es-nav-prev">Previous</span>
                <span class="es-nav-next">Next</span>
            </div></div>
        <!-- End Elastislide Carousel Thumbnail Viewer -->
    </div><!-- rg-thumbs -->
    <div class="rg-image-wrapper">
        <div class="rg-image-nav">
            <a href="" class="rg-image-nav-prev"></a>
            <a href="" class="rg-image-nav-next"></a>
        </div>
        <div class="rg-image">
            <img src="">
        </div>
        <div class="rg-loading" style="display: none;"></div>
        <div class="rg-caption-wrapper">      <div class="rg-caption" style="">
                </div>     </div>    </div></div><!-- rg-gallery -->

<script type="text/javascript" src="/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/jquery.elastislide.js"></script>
<script type="text/javascript" src="/js/gallery.js"></script>