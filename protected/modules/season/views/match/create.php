<?php
/* @var $this MatchController */
/* @var $model Match */

$this->breadcrumbs=array(
	'Матчи'=>array('admin'),
	'Добавить',
);
?>

<h1>Добавить матч</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>