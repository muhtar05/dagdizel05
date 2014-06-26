<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
);
?>
<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Страницы</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'title',
		'slug',
		'parent_id',
		'seo_title',
		/*
		'seo_keywords',
		'seo_description',
		'pos',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>





