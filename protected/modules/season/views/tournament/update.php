<?php
/* @var $this TournamentController */
/* @var $model Tournament */

$this->breadcrumbs=array(
	'Турнирная таблица'=>array('admin'),
	'Редактирование',
);
?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>