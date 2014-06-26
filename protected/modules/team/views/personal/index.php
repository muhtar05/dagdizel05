<?php
/* @var $this PersonalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Персонал',
);
?>

<h1>Персонал</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'itemsTagName'=>'ul',
    'summaryText'=>'',
)); ?>
<div class="clearfix"></div>
