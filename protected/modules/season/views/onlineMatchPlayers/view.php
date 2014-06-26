<?php
/* @var $this OnlineMatchPlayersController */
/* @var $model OnlineMatchPlayers */

$this->breadcrumbs=array(
	'Online Match Players'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OnlineMatchPlayers', 'url'=>array('index')),
	array('label'=>'Create OnlineMatchPlayers', 'url'=>array('create')),
	array('label'=>'Update OnlineMatchPlayers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OnlineMatchPlayers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OnlineMatchPlayers', 'url'=>array('admin')),
);
?>

<h1>View OnlineMatchPlayers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'team_id',
		'goal',
		'yelow_card',
		'red_card',
		'change',
		'team_composition',
	),
)); ?>
