<?php
/* @var $this VideoController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle = 'Видео | '.$this->pageTitle;
$this->breadcrumbs=array(
	'Видео',
);
?>
<div class="custom-content">
<h1 class="customh1">Видео</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText'=>'',
    'cssFile'=>false,
    'template'=>'{items}<div class="clearfix"></div><div class="col-md-12 col-sm-12 col-xs-12">{pager}</div>',
    'sortableAttributes'=>array(
        'date',
    ),
    'htmlOptions'=>array(
        'class'=>'list-view-gallery',
    ),
    'pager'=>array(
        'cssFile'=>false,
        'header'=>'',
        'prevPageLabel' => '',
        'nextPageLabel' => '',

    ),
)); ?>
</div>