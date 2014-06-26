<?php
/* @var $this OnlineMatchPlayersController */
/* @var $model OnlineMatchPlayers */

$this->breadcrumbs=array(
	'Online Match Players'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OnlineMatchPlayers', 'url'=>array('index')),
	array('label'=>'Manage OnlineMatchPlayers', 'url'=>array('admin')),
);
?>

<h1>Create OnlineMatchPlayers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>