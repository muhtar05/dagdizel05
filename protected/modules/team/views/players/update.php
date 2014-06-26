<?php
/* @var $this PlayersController */
/* @var $model Players */

$this->breadcrumbs=array(
	'Игроки'=> array('admin'),
	'Редактирование',
);


?>

<h1>Редактировать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>