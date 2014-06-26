<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Галереи'=>array('admin'),
	$model->name=>array('galleryphoto/category','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
	array('label'=>'View Gallery', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>