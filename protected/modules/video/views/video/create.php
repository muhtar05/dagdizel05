<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Видеоархив'=>array('admin'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>