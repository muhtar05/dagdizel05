<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Карусель'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'List Carousel', 'url'=>array('index')),
	array('label'=>'Create Carousel', 'url'=>array('create')),
	array('label'=>'View Carousel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Carousel', 'url'=>array('admin')),
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>