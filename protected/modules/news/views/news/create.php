<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>