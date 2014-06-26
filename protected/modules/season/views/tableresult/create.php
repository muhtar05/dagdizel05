<?php
/* @var $this TableresultController */
/* @var $model TableResult */

$this->breadcrumbs=array(
	'Турнирная таблица'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List TableResult', 'url'=>array('index')),
	array('label'=>'Manage TableResult', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>