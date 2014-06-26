<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Галереи'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>