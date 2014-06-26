<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->breadcrumbs=array(
	'Персонал'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Personal', 'url'=>array('index')),
	array('label'=>'Create Personal', 'url'=>array('create')),
);
?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Персонал</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'fio',
		'description',
        'personal_type',
		array(
           'name'=>'img',
           'type'=>'html',
           'value'=>'CHtml::image($data->findIMGByResolution("150x150", "width"))',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
