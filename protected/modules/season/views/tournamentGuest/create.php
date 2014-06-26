<?php
/* @var $this TournamentGuestController */
/* @var $model TournamentGuest */

$this->breadcrumbs=array(
	'Tournament Guests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TournamentGuest', 'url'=>array('index')),
	array('label'=>'Manage TournamentGuest', 'url'=>array('admin')),
);
?>

<h1>Create TournamentGuest</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>