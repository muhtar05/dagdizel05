<style>

  .nav-tournament-top {
      margin-top:15px;
  }
  .nav-tournament-top li.active {
      background-color:#067bbf;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
  }

  .nav-tournament-top li a {
      color:#21262c;
      font-size: 14px;
      font-family: Tahoma;

  }
  .nav-tournament-top>li.active>a, .nav-tournament-top>li.active>a:hover, .nav-tournament-top>li.active>a:focus{
      background-color: #067bbf;
      border: 1px solid #067bbf;
      color:#fff;
  }
</style>
<?php
$this->breadcrumbs=array(
	'Турнирная таблица',
);
?>

<h1>Первенство России 2013-14.Второй дивизион.Зона Юг</h1>


<ul class="nav nav-tabs nav-tournament-top">
    <li class="active"><a href="#all" data-toggle="tab">Всего</a></li>
    <li><a href="#home" data-toggle="tab">Дома</a></li>
    <li><a href="#guest" data-toggle="tab">В Гостях</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="all">

        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'tournament-grid',
            'dataProvider'=>$dataProvider,
            'cssFile'=>false,
            'itemsCssClass'=>'table tournament-table-all',
            'summaryText'=>'',
            'enableSorting'=>false,
            'rowHtmlOptionsExpression' => 'array("style"=>($data->teams->main == 1) ? "background-color:#ffff4c;": "")',
            'columns'=>array(
                array(
                  'type'=>'raw',
                  'value'=>'$data->place',
                ),
                array(
                    'name'=>'team_name',
                    'type'=>'raw',
                    'value'=>'($data->teams) ? CHtml::image($data->teams->getLogo(),"",array("class"=>"hidden-xs pull-left","width"=>21,"height"=>21)).$data->teams->name : ""',
                    'htmlOptions'=>array(
                        'class'=>'commands',

                    ),
                ),
                'total_matches',
                'win',
                'draw',
                'defeat',
                array(
                    'name'=>'goal_stat',
                     'htmlOptions'=>array(
                         'class'=>'hidden-xs',
                     ),
                ),
                'points',
            ),
        )); ?>

    </div>


    <div class="tab-pane" id="home">

        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'tournament-grid-home',
            'dataProvider'=>$dataProviderHome,
            'cssFile'=>false,
            'itemsCssClass'=>'table tournament-table-all',
            'summaryText'=>'',
            'enableSorting'=>false,
            'rowHtmlOptionsExpression' => 'array("style"=>($data->teams->main == 1) ? "background-color:#ffff4c;": "")',
            'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>'$data->place',
                ),
                array(
                    'name'=>'team_name',
                    'type'=>'raw',
                    'value'=>'($data->teams) ? CHtml::image($data->teams->getLogo(),"",array("class"=>"hidden-xs pull-left","width"=>21,"height"=>21)).$data->teams->name : ""',
                    'htmlOptions'=>array(
                        'class'=>'commands',

                    ),
                ),
                'total_matches',
                'win',
                'draw',
                'defeat',
//                array(
//                    'name'=>'goal_stat',
//                    'htmlOptions'=>array(
//                        'class'=>'hidden-xs',
//                    ),
//                ),
                'points',
            ),
        )); ?>

    </div>
    <div class="tab-pane" id="guest">

        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'tournament-grid-guest',
            'dataProvider'=>$dataProviderGuest,
            'cssFile'=>false,
            'itemsCssClass'=>'table tournament-table-all',
            'enableSorting'=>false,
            'summaryText'=>'',
            'rowHtmlOptionsExpression' => 'array("style"=>($data->teams->main == 1) ? "background-color:#ffff4c;": "")',
            'columns'=>array(
                array(
                    'type'=>'raw',
                    'value'=>'$data->place',
                ),
                array(
                    'name'=>'team_name',
                    'type'=>'raw',
                    'value'=>'($data->teams) ? CHtml::image($data->teams->getLogo(),"",array("class"=>"hidden-xs pull-left","width"=>21,"height"=>21)).$data->teams->name : ""',
                    'htmlOptions'=>array(
                        'class'=>'commands',

                    ),
                ),
                'total_matches',
                'win',
                'draw',
                'defeat',
//                array(
//                    'name'=>'goal_stat',
//                    'htmlOptions'=>array(
//                        'class'=>'hidden-xs',
//                    ),
//                ),
                'points',
            ),
        )); ?>


    </div>

</div>


<script type="text/javascript">
    $(function(){
      var width = $(window).width();
      if (width<768){
          $("#tournament-grid_c6").addClass('hidden-xs');
          $("#tournament-grid-home_c6").addClass('hidden-xs');
          $("#tournament-grid-guest_c6").addClass('hidden-xs');
      }
    });
</script>