<?php
/* @var $this PasgolController */
/* @var $model Pasgol */

$this->breadcrumbs=array(
	'Pasgols'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pasgol', 'url'=>array('index')),
	array('label'=>'Create Pasgol', 'url'=>array('create')),
);
?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>
</div>

<h1>Гол + Пас</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pasgol-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'place',
		'player_name',
		'goal',
		'pas',
		'total',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
