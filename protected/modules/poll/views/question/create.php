<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Голосование'=>array('admin'),
	'Создать',
);
?>

<h1>Создать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>