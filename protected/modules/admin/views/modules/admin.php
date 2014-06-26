<?php
/* @var $this ModulesController */
/* @var $model Modules */

$this->breadcrumbs=array(
	'Модули'=>array('admin'),
	'Управление',
);

?>

<div class="well" style="margin-top:20px; ">
    <?php echo CHtml::link('Добавить',array('create'),array('class'=>'btn btn-primary'));?>

</div>

<h1>Модули</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'modules-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'name',
		'url',
		'code_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
