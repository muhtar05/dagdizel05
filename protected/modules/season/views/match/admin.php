<?php
/* @var $this MatchController */
/* @var $model Match */

$this->breadcrumbs=array(
	'Матчи'=>array('admin'),
	'Управление',
);
?>

<div class="well" style="margin-top:20px; ">
    <h2>Сезоны</h2>
    <?php foreach($seasonYears as $syear):?>
        <span style="padding:10px;">
              <?php echo CHtml::link($syear->name,array('/season/match/admin/id/'.$syear->id));?>
        </span>
    <?php endforeach;?>
</div>

<div class="well" style="margin-top:20px; ">
    <?php echo CHtml::link('Добавить новый', array('create'),array('class'=>'btn btn-small btn-primary'));?>
</div>

<h1>Матчи.Сезон <b><?php echo $currentSeason->name;?></b></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'match-grid',
	'dataProvider'=>$dataProvider,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'columns'=>array(
        'tour',
        array(
            'name'=>'season_year',
            'value'=>'$data->seasonYear->name',
        ),
        array(
          'name'=>'team_home',
          'value'=>'Teams::model()->findByPk($data->team_home)->name',
        ),
        array(
            'name'=>'team_guest',
            'value'=>'Teams::model()->findByPk($data->team_guest)->name',
        ),
        'result',
		'date',

        array(
          'type'=>'raw',
          'value'=>'CHtml::link("Текстовая трансляция",array("/season/onlineMatchComment/admin","id"=>$data->id))',
        ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
