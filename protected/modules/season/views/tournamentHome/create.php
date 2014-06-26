<?php
/* @var $this TournamentHomeController */
/* @var $model TournamentHome */

$this->breadcrumbs=array(
	'Tournament Homes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TournamentHome', 'url'=>array('index')),
	array('label'=>'Manage TournamentHome', 'url'=>array('admin')),
);
?>

<h1>Create TournamentHome</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>