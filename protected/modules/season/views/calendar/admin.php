<?php
$this->breadcrumbs=array(
	'Календарь'=>array('admin'),
	'Управление',
);


?>

<div class="well" style="margin-top:20px; ">
    <h2>Сезоны</h2>
    <?php foreach($seasonYears as $syear):?>
        <span style="padding:10px;">
              <?php echo CHtml::link($syear->name,array('/season/calendar/admin/id/'.$syear->id));?>
        </span>
    <?php endforeach;?>
</div>

<div class="well" style="margin-top:20px; ">
    <?php echo CHtml::link('Добавить новый', array('create'),array('class'=>'btn btn-small btn-primary'));?>

</div>

<h1>Календарь.Сезон <b><?php echo $currentSeason->name;?></b></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'calendar-grid',
	'dataProvider'=>$dataProvider,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'columns'=>array(
		'tour',
        array(
           'name'=>'season_year',
           'value'=>'$data->seasonYear->name',
        ),
		'date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
