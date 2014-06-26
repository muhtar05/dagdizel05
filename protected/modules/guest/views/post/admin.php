<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Посты'=>array('index'),
	'Управление',
);

?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>
</div>

<h1>Управление</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'title',
		'date',
        array(
            'name'=>'user_id',
            'value'=>'$data->author->username',
            'filter'=>CHtml::listData(User::model()->findAll(),'id','username'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
