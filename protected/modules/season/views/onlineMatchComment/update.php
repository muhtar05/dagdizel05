<?php
/* @var $this OnlineMatchCommentController */
/* @var $model OnlineMatchComment */

$this->breadcrumbs=array(
	'Online Match Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OnlineMatchComment', 'url'=>array('index')),
	array('label'=>'Create OnlineMatchComment', 'url'=>array('create')),
	array('label'=>'View OnlineMatchComment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OnlineMatchComment', 'url'=>array('admin')),
);
?>

<h1>Update OnlineMatchComment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>