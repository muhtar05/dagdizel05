<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Посты'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>