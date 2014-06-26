<?php
/* @var $this OnlineMatchCommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Online Match Comments',
);

$this->menu=array(
	array('label'=>'Create OnlineMatchComment', 'url'=>array('create')),
	array('label'=>'Manage OnlineMatchComment', 'url'=>array('admin')),
);
?>

<h1>Online Match Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
