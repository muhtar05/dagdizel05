<?php

$this->breadcrumbs=array(
	'Тренеры'=>array('index'),
	'Управление',
);
?>



<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>
</div>

<h1>Тренеры</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coaches-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'fio',
		'description',
		'info',
        array(
            'name'=>'img',
            'type'=>'html',
            'value'=>'CHtml::image($data->findIMGByResolution("100x100", "width"))',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
