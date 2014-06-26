<?php
/* @var $this GalleryController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle = 'Фото | '.$this->pageTitle;
$this->breadcrumbs=array(
	'Фотогалереи',
);
?>

<div class="custom-content">
<h1 class="customh1">Список фотогалерей</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText'=>'',
    'cssFile'=>false,
    'template'=>'{items}<div class="clearfix"></div><div class="col-md-12 col-sm-12 col-xs-12">{pager}</div>',
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