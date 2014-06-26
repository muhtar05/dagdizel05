<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	'Команды'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>