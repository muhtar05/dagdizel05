<?php
/* @var $this ModulesController */
/* @var $model Modules */

$this->breadcrumbs=array(
	'Модули'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>