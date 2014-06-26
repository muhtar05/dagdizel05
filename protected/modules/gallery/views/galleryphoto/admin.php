<?php
/* @var $this GalleryphotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GalleryPhoto', 'url'=>array('index')),
	array('label'=>'Create GalleryPhoto', 'url'=>array('create')),
);
?>

<h1>Галерея</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-photo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'img',
		'gallery_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
