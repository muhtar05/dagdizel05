<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Комментарии'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
);

?>

<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>
</div>

<h1>Комментарии</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
        array(
          'name'=>'text',
          'htmlOptions'=>array(
              'width'=>'200px',
          ),
        ),
        array(
          'name'=>'post_id',
          'value'=>'$data->post->title',
            'htmlOptions'=>array(
                'width'=>'250px',
            ),
        ),
        array(
            'name'=>'user_id',
            'value'=>'($data->author->username)? $data->author->username : "Гость"',
            'filter'=>CHtml::listData(User::model()->findAll(),'id','username'),
        ),
		'create_date',
        array(
           'name'=>'status',
            'value'=>'$data->getStatus()',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
