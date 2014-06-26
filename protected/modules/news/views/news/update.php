<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	$model->title,
	'Обновить',
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>