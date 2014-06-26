<?php
$this->breadcrumbs=array(
	'Опросы',
);
?>

<h1>Опросы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>