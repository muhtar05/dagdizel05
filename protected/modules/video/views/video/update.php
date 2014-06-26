<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Видеоархив'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
	array('label'=>'View Video', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>