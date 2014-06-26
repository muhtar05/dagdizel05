<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Карусель'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List Carousel', 'url'=>array('index')),
	array('label'=>'Manage Carousel', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>