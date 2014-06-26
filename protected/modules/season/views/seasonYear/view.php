<?php
/* @var $this SeasonYearController */
/* @var $model SeasonYear */

$this->breadcrumbs=array(
	'Season Years'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SeasonYear', 'url'=>array('index')),
	array('label'=>'Create SeasonYear', 'url'=>array('create')),
	array('label'=>'Update SeasonYear', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SeasonYear', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SeasonYear', 'url'=>array('admin')),
);
?>

<h1>View SeasonYear #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
