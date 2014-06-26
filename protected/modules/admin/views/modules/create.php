<?php
/* @var $this ModulesController */
/* @var $model Modules */

$this->breadcrumbs=array(
	'Моули'=>array('admin'),
	'Добавить',
);
?>

<h1>Добавить</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>