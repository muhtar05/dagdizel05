<?php
/* @var $this OnlineMatchPlayersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Online Match Players',
);

$this->menu=array(
	array('label'=>'Create OnlineMatchPlayers', 'url'=>array('create')),
	array('label'=>'Manage OnlineMatchPlayers', 'url'=>array('admin')),
);
?>

<h1>Online Match Players</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
