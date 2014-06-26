<?php
/* @var $this CoachesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Тренерский штаб',
);
?>

<h1>Тренеры</h1>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'itemsTagName'=>'ul',
    'summaryText'=>'',
)); ?>
