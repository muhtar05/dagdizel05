<?php
/* @var $this OnlineMatchController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Online Matches',
);

$this->menu=array(
	array('label'=>'Create OnlineMatch', 'url'=>array('create')),
	array('label'=>'Manage OnlineMatch', 'url'=>array('admin')),
);
?>

<h1>Online Matches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
