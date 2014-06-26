<?php
/* @var $this SeasonYearController */
/* @var $model SeasonYear */

$this->breadcrumbs=array(
	'Сезоны'=>array('admin'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List SeasonYear', 'url'=>array('index')),
	array('label'=>'Manage SeasonYear', 'url'=>array('admin')),
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>