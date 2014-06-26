<?php
/* @var $this OnlineMatchController */
/* @var $model OnlineMatch */

$this->breadcrumbs=array(
	'Online Matches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OnlineMatch', 'url'=>array('index')),
	array('label'=>'Manage OnlineMatch', 'url'=>array('admin')),
);
?>

<h1>Create OnlineMatch</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>