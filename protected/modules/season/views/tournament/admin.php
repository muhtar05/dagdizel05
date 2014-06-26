<?php
/* @var $this TournamentController */
/* @var $model Tournament */

$this->breadcrumbs=array(
	'Турнирная таблица'=>array('admin'),
	'Управление',
);
?>

<div class="well" style="margin-top:20px; ">
    <h2>Сезоны</h2>
    <?php foreach($seasonYears as $syear):?>
        <span style="padding:10px;">
              <?php echo CHtml::link($syear->name,array('/season/tournament/admin/id/'.$syear->id));?>
        </span>
    <?php endforeach;?>
</div>


<?php
//Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
$str_js = "
    var fixHelper = function(e,ui) {
        ui.children().each(function(){
            $(this).width($(this).width());
        });
        return ui;
    };

    $('#tournament-grid table.items tbody').sortable({
        forcePlaceholderSize:true,
        forceHelperSize: true,
        items: 'tr',
        update : function() {
            serial = $('#tournament-grid table.items tbody').sortable('serialize',{key:'items[]',attribute:'class'});
            $.ajax({
                'url': '".$this->createUrl('/season/tournament/sort')."',
                'type': 'post',
                'data': serial,
                'success': function(data){
                },
                'error':function(request,status,error){
                    alert('Error');
                }

            });
        },
        helper: fixHelper
    }).disableSelection();
";
Yii::app()->clientScript->registerScript('sortable-project',$str_js);
?>



<div class="well" style="margin-top:20px; ">

    <?php echo CHtml::link('Добавить новый', array('create'),array('class'=>'btn btn-small btn-primary'));?>
    <?php echo CHtml::link('Сгенерировать домашную и гостевую таблицы', array('generate'),array('class'=>'btn btn-small btn-primary'));?>
</div>

<h1>Итоговая турнирная таблица.Сезон <b><?php echo $currentSeason->name;?></b></h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tournament-grid',
	'dataProvider'=>$dataProvider,
    'cssFile'=>false,
    'itemsCssClass'=>'table table-striped table-bordered table-hover items',
    'rowCssClassExpression'=>'"items[]_{$data->id}"',

	'columns'=>array(
		'place',
		 array(
           'name'=>'team_name',
           'value'=>'$data->teams->name',
         ),
		'total_matches',
		'win',
		'draw',
		'defeat',
		'goal_stat',
		'points',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
