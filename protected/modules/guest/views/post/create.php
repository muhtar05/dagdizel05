<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Посты'=>array('index'),
	'Добавление',
);

?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>