<?php
/* @var $this PasgolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pasgols',
);

$this->menu=array(
	array('label'=>'Create Pasgol', 'url'=>array('create')),
	array('label'=>'Manage Pasgol', 'url'=>array('admin')),
);
?>

<h1>Pasgols</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
