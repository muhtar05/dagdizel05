<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Меню'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
	array('label'=>'View Menu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>