<?php
/* @var $this ChoiceController */
/* @var $model Choice */

$this->breadcrumbs=array(
	'Choices'=>array('index'),
	'Manage',
);


?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Управление </h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'choice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'choice_text',
		'votes',
		'question_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
