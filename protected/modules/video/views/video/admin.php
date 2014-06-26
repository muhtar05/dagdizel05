<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'Видеоархив'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
);
?>
<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Видеоархив</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'video-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'name',
        array(
            'name'=>'content',
            'type'=>'raw',
            'value'=>'$data->content',
        ),
        'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
