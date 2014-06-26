<?php
/* @var $this TournamentHomeController */
/* @var $model TournamentHome */

$this->breadcrumbs=array(
	'Tournament Homes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TournamentHome', 'url'=>array('index')),
	array('label'=>'Create TournamentHome', 'url'=>array('create')),
	array('label'=>'View TournamentHome', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TournamentHome', 'url'=>array('admin')),
);
?>

<h1>Update TournamentHome <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>