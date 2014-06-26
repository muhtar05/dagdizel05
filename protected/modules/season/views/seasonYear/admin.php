<?php
/* @var $this SeasonYearController */
/* @var $model SeasonYear */

$this->breadcrumbs=array(
	'Season Years'=>array('index'),
	'Manage',
);
?>

<h1>Сезоны</h1>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'season-year-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'name',
        array(
            'name'=>'current',
            'value'=>'($data->current == 2)? "Да" : "Нет"',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
