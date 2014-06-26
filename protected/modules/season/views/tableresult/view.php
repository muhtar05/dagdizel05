<?php
/* @var $this TableresultController */
/* @var $model TableResult */

$this->breadcrumbs=array(
	'Table Results'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TableResult', 'url'=>array('index')),
	array('label'=>'Create TableResult', 'url'=>array('create')),
	array('label'=>'Update TableResult', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TableResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TableResult', 'url'=>array('admin')),
);
?>

<h1>View TableResult #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'team_1',
		'team_2',
		'team_3',
		'team_4',
		'team_5',
		'team_6',
		'team_7',
		'team_8',
		'team_9',
		'team_10',
		'team_11',
		'team_12',
		'team_13',
		'team_14',
		'team_15',
		'team_16',
		'team_17',
		'team_18',
	),
)); ?>
