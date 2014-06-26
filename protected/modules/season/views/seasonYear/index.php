<?php
/* @var $this SeasonYearController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Season Years',
);

$this->menu=array(
	array('label'=>'Create SeasonYear', 'url'=>array('create')),
	array('label'=>'Manage SeasonYear', 'url'=>array('admin')),
);
?>

<h1>Season Years</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
