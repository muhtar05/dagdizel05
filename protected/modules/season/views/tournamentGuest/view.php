<?php
/* @var $this TournamentGuestController */
/* @var $model TournamentGuest */

$this->breadcrumbs=array(
	'Tournament Guests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TournamentGuest', 'url'=>array('index')),
	array('label'=>'Create TournamentGuest', 'url'=>array('create')),
	array('label'=>'Update TournamentGuest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TournamentGuest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TournamentGuest', 'url'=>array('admin')),
);
?>

<h1>View TournamentGuest #<?php echo $model->id; ?></h1>

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
