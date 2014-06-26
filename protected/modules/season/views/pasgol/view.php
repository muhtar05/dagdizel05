<?php
/* @var $this PasgolController */
/* @var $model Pasgol */

$this->breadcrumbs=array(
	'Pasgols'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pasgol', 'url'=>array('index')),
	array('label'=>'Create Pasgol', 'url'=>array('create')),
	array('label'=>'Update Pasgol', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pasgol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pasgol', 'url'=>array('admin')),
);
?>

<h1>View Pasgol #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'place',
		'player_name',
		'goal',
		'pas',
		'total',
	),
)); ?>
