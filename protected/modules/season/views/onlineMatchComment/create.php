<?php
/* @var $this OnlineMatchCommentController */
/* @var $model OnlineMatchComment */

$this->breadcrumbs=array(
	'Online Match Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OnlineMatchComment', 'url'=>array('index')),
	array('label'=>'Manage OnlineMatchComment', 'url'=>array('admin')),
);
?>

<h1>Create OnlineMatchComment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>