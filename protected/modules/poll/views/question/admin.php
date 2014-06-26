<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Question', 'url'=>array('index')),
	array('label'=>'Create Question', 'url'=>array('create')),
);
?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Вопросы</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'question-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'question_text',
        array(
           'header'=>'Варианты',
           'type'=>'raw',
           'value'=>'$data->getChoiceHtml()',
        ),
		'pub_date',
		array(
           'name'=>'show',
           'type'=>'raw',
           'value'=>'($data->show == 2)? "Да" : "Нет"',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
