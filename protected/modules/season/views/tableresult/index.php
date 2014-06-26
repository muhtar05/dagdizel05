<?php
/* @var $this TableresultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Table Results',
);

$this->menu=array(
	array('label'=>'Create TableResult', 'url'=>array('create')),
	array('label'=>'Manage TableResult', 'url'=>array('admin')),
);
?>

<h1>Table Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
