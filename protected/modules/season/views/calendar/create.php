<?php
/* @var $this CalendarController */
/* @var $model Calendar */

$this->breadcrumbs=array(
	'Календарь'=>array('admin'),
	'Добавление',
);

?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>