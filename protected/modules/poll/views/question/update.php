<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Голосование'=>array('admin'),
	'Редоктирование',
);
?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>