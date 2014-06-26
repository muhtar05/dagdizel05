<?php
/* @var $this CoachesController */
/* @var $model Coaches */

$this->breadcrumbs=array(
	'Тренеры'=>array('admin'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List Coaches', 'url'=>array('index')),
	array('label'=>'Manage Coaches', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>