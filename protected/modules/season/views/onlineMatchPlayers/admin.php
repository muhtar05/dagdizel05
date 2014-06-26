<?php
/* @var $this OnlineMatchPlayersController */
/* @var $model OnlineMatchPlayers */

$this->breadcrumbs=array(
	'Online Match Players'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OnlineMatchPlayers', 'url'=>array('index')),
	array('label'=>'Create OnlineMatchPlayers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#online-match-players-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Online Match Players</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'online-match-players-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'team_id',
		'goal',
		'yelow_card',
		'red_card',
		/*
		'change',
		'team_composition',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
