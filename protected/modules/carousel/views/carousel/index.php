<?php
/* @var $this CarouselController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carousels',
);

$this->menu=array(
	array('label'=>'Create Carousel', 'url'=>array('create')),
	array('label'=>'Manage Carousel', 'url'=>array('admin')),
);
?>

<h1>Carousels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
