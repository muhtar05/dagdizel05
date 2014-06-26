<?php
/* @var $this CalendarController */
/* @var $model Calendar */

$this->breadcrumbs=array(
	'Календарь'=>array('admin'),
	'Редактирование',
);

?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'calendarResults'=>$calendarResults)); ?>