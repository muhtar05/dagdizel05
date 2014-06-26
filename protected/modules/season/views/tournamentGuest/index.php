<?php
/* @var $this TournamentGuestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tournament Guests',
);

$this->menu=array(
	array('label'=>'Create TournamentGuest', 'url'=>array('create')),
	array('label'=>'Manage TournamentGuest', 'url'=>array('admin')),
);
?>

<h1>Tournament Guests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
