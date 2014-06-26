<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Teams', 'url'=>array('index')),
	array('label'=>'Create Teams', 'url'=>array('create')),
);
?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Команды</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'teams-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'name',
		'fullname',
		'logo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
