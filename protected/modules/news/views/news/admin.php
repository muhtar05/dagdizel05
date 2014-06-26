<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	'Управеление',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
);
?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Управление новостями</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'title',
//		'shorttext',
//		'text',
		array(
            'name' => 'is_main',
            'value' => '$data->is_main == 0 ? "Обычная":"<span style=\"color:#f00;\">Главная</span>"',
            'type' => 'raw',
            'filter' => array("Обычная", "Главная")
        ),

//		'img',
		//'date',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
		),
	),
)); ?>
