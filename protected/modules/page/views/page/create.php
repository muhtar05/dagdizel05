<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('admin'),
	'Добавить',
);
?>

<h1>Добавление страницы</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>