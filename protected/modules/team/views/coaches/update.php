<?php
/* @var $this CoachesController */
/* @var $model Coaches */

$this->breadcrumbs=array(
	'Тренеры'=>array('admin'),
	$model->fio=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>