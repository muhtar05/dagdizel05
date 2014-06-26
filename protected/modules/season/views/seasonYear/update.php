<?php
/* @var $this SeasonYearController */
/* @var $model SeasonYear */

$this->breadcrumbs=array(
	'Сезоны'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);


?>

<h1>Редактирование</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>