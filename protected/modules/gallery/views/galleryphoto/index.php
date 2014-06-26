<?php
/* @var $this GalleryphotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gallery Photos',
);

$this->menu=array(
	array('label'=>'Create GalleryPhoto', 'url'=>array('create')),
	array('label'=>'Manage GalleryPhoto', 'url'=>array('admin')),
);
?>

<h1>Gallery Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
