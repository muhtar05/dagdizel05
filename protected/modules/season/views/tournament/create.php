<?php

$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	'Create',
);
?>

<h1>Добавить</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>