<?php
/* @var $this PersonalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Руководство и сотрудники',
);
?>

<h1>Руководство и сотрудники</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'itemsTagName'=>'ul',
    'summaryText'=>'',
)); ?>
<div class="clearfix"></div>
