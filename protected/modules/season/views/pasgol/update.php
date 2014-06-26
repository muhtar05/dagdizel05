<?php
/* @var $this PasgolController */
/* @var $model Pasgol */

$this->breadcrumbs=array(
	'Гол + пас'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирвоание',
);
?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>