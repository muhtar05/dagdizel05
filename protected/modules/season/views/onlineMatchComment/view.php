<?php
/* @var $this OnlineMatchCommentController */
/* @var $model OnlineMatchComment */

$this->breadcrumbs=array(
	'Online Match Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OnlineMatchComment', 'url'=>array('index')),
	array('label'=>'Create OnlineMatchComment', 'url'=>array('create')),
	array('label'=>'Update OnlineMatchComment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OnlineMatchComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OnlineMatchComment', 'url'=>array('admin')),
);
?>

<h1>View OnlineMatchComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'text',
		'create_time',
		'match_id',
	),
)); ?>
