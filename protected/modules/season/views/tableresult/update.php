<?php
/* @var $this TableresultController */
/* @var $model TableResult */

$this->breadcrumbs=array(
	'Table Results'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TableResult', 'url'=>array('index')),
	array('label'=>'Create TableResult', 'url'=>array('create')),
	array('label'=>'View TableResult', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TableResult', 'url'=>array('admin')),
);
?>

<h1>Update TableResult <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>