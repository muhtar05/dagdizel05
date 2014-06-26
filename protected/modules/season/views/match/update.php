<?php
/* @var $this MatchController */
/* @var $model Match */

$this->breadcrumbs=array(
	'Матчи'=>array('admin'),
	'Редактирование',
);
?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>