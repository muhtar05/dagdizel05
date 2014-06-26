<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/bootstrap.min.css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/bootstrap-responsive.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/font-awesome.min.css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

    <!--ace styles-->

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ace.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ace-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/admin.css" />


    <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
    <?php Yii::app()->clientScript->registerScriptFile('/js/admin/main.js', CClientScript::POS_END); ?>

    <style>
        .filters>td>input {
            width:100px;
        }
    </style>


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="#" class="brand">
                <small>
                    <i class="icon-leaf"></i>
                    Административная панель
                </small>
            </a><!--/.brand-->

        </div><!--/.container-fluid-->
    </div><!--/.navbar-inner-->
</div>

<div class="main-container container-fluid">
    <div class="sidebar" id="sidebar">

        <?php
        $this->widget('UserMenu');
        ?>

    </div>


    <div class="main-content">

        <div class="page-content">

            <div class="breadcrumbs">
                <?php $this->breadcrumbs = array_merge(array(Yii::t('zii','Home')=>'/admin'),$this->breadcrumbs); ?>
                <?php
                                $this->widget('zii.widgets.CBreadcrumbs', array(
                                    'links' => $this->breadcrumbs,
                                    'homeLink'=>false,
                                    //'homeLink' => CHtml::link('Главная', array('/admin/')),
                                    'tagName'=>'ul',
                                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                                    'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                                    'htmlOptions'=>array ('class'=>'breadcrumb'),
                                ));
                            ?><!-- breadcrumbs -->
            </div>
            <?php echo $content; ?>
        </div>
    </div>

</div>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/bootstrap.min.js"></script>

<!--page specific plugin scripts-->

<!--[if lte IE 8]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/excanvas.min.js"></script>
<![endif]-->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.slimscroll.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.easy-pie-chart.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.sparkline.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.flot.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.flot.pie.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.flot.resize.min.js"></script>

<!--ace scripts-->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/ace-elements.min.js"></script>



</body>
</html>