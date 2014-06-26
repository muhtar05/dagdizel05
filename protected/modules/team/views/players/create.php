<?php
/* @var $this PlayersController */
/* @var $model Players */

$this->breadcrumbs=array(
	'Игроки'=>array('admin'),
	'Создать',
);

?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>