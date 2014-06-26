<?php
/* @var $this OnlineMatchPlayersController */
/* @var $model OnlineMatchPlayers */

$this->breadcrumbs=array(
	'Online Match Players'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OnlineMatchPlayers', 'url'=>array('index')),
	array('label'=>'Create OnlineMatchPlayers', 'url'=>array('create')),
	array('label'=>'View OnlineMatchPlayers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OnlineMatchPlayers', 'url'=>array('admin')),
);
?>

<h1>Update OnlineMatchPlayers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>