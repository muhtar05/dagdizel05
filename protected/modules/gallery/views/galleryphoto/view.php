<?php
/* @var $this GalleryphotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GalleryPhoto', 'url'=>array('index')),
	array('label'=>'Create GalleryPhoto', 'url'=>array('create')),
	array('label'=>'Update GalleryPhoto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GalleryPhoto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GalleryPhoto', 'url'=>array('admin')),
);
?>

<h1>View GalleryPhoto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'img',
		'pos',
		'gallery_id',
	),
)); ?>
