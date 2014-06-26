<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('admin'),
	'Администрирование',
);
?>
<div class="well" style="margin-top:20px; ">
    <a class="btn btn-primary btn-small" href="create">Добавить новый</a>

</div>
<h1>Пользователи</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'username',
		'email',
	    array(
          'name'=>'roleId',
          'value'=>'$data->getRoleName()',
        ),
//        array(
//            //''=>'кол-во',
//            'value'=>'$data->commentsCount',
//        ),

		'ip_address',
        array(
           'name'=>'ban',
           'type'=>'raw',
           'value'=>'($data->ban == 1) ? "Нет" : "Да"',
        ),
        /*
		'last_visit',
		'registration_date',
		'ban',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
