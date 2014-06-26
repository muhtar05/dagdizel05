<?php
/* @var $this TournamentHomeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tournament Homes',
);

$this->menu=array(
	array('label'=>'Create TournamentHome', 'url'=>array('create')),
	array('label'=>'Manage TournamentHome', 'url'=>array('admin')),
);
?>

<h1>Tournament Homes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
