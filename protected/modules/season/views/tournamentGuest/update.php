<?php
/* @var $this TournamentGuestController */
/* @var $model TournamentGuest */

$this->breadcrumbs=array(
	'Tournament Guests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TournamentGuest', 'url'=>array('index')),
	array('label'=>'Create TournamentGuest', 'url'=>array('create')),
	array('label'=>'View TournamentGuest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TournamentGuest', 'url'=>array('admin')),
);
?>

<h1>Update TournamentGuest <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>