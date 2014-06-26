<?php
/* @var $this GalleryphotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	'Create',
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>