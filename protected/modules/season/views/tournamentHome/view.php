<?php
/* @var $this TournamentHomeController */
/* @var $model TournamentHome */

$this->breadcrumbs=array(
	'Tournament Homes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TournamentHome', 'url'=>array('index')),
	array('label'=>'Create TournamentHome', 'url'=>array('create')),
	array('label'=>'Update TournamentHome', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TournamentHome', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TournamentHome', 'url'=>array('admin')),
);
?>

<h1>View TournamentHome #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'place',
		'team_name',
		'total_matches',
		'win',
		'draw',
		'defeat',
		'goal_stat',
		'points',
	),
)); ?>
