<?php
/* @var $this OnlineMatchController */
/* @var $model OnlineMatch */

$this->breadcrumbs=array(
	'Онлайн трансляция'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OnlineMatch', 'url'=>array('index')),
	array('label'=>'Create OnlineMatch', 'url'=>array('create')),
	array('label'=>'Update OnlineMatch', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OnlineMatch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OnlineMatch', 'url'=>array('admin')),
);
?>

<h1>Онлайн трансляция<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'match_id',
	),
)); ?>
