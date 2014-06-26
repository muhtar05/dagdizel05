<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Карусель'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Carousel', 'url'=>array('index')),
	array('label'=>'Create Carousel', 'url'=>array('create')),
);
?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Управление</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'carousel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'title',
		'img',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
