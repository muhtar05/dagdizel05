<?php
/* @var $this OnlineMatchController */
/* @var $model OnlineMatch */

$this->breadcrumbs=array(
	'Online Matches'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OnlineMatch', 'url'=>array('index')),
	array('label'=>'Create OnlineMatch', 'url'=>array('create')),
	array('label'=>'View OnlineMatch', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OnlineMatch', 'url'=>array('admin')),
);
?>

<h1>Update OnlineMatch <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>