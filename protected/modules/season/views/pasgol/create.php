<?php
/* @var $this PasgolController */
/* @var $model Pasgol */

$this->breadcrumbs=array(
	'Pasgols'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pasgol', 'url'=>array('index')),
	array('label'=>'Manage Pasgol', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>