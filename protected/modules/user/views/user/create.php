<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_formRegistration', array('model'=>$model)); ?>