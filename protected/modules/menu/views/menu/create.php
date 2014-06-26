<?php

$this->breadcrumbs=array(
	'Меню'=>array('admin'),
	'Добавление',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>