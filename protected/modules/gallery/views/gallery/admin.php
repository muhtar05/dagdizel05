<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Галереи'=>array('admin'),
	'Управление',
);

?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>
</div>
<h1>Галереи</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
        array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>'CHtml::link($data->name,array("galleryphoto/category/id/$data->id"))',
        ),

        'create_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
