<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('admin'),
	$model->title,
	'Update',
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>