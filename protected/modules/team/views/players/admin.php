<?php
/* @var $this PlayersController */
/* @var $model Players */

$this->breadcrumbs=array(
	'Игроки'=>array('admin'),
	'Управление',
);

?>
<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>

<h1>Игроки</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'players-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'fio',
        array(
            'name'=>'img',
            'type'=>'html',
            'value'=>'CHtml::image($data->findIMGByResolution("100x100", "width"))',
        ),
		'born_date',
        array(
            'name'=>'amplua_id',
            'value'=>'$data::getAmpluaName($data->amplua_id)',
        ),
		/*
		'weight',
		'img',
		'info',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
