<style>
    .tour-label {
        background: url("/images/bg_menu.png") repeat-x #1174b4;
        color: #fff;
        font-size: 14px;
        font-family: Tahoma,Helvetica,sans-serif;
        text-align: center;
        line-height: 24px;
    }
</style>
<?php
$this->breadcrumbs=array(
	'Календарь матчей',
);
?>

<h1>Календарь матчей</h1>
<form method="GET">
<div class="styled-select">
    <?php
    echo CHtml::dropDownList('season_year','season_year',CHtml::listData(SeasonYear::model()->findAll(),'name','name'),

        array(
            'options' => array($seasonYear=>array('selected'=>true)),
            'onchange'=>'js:this.form.submit()'

        ));
    ?>
</div>
</form>
<?php $item = 0;?>
<?php foreach($dataProvider->getData() as $data):?>
    <?php $item++;?>
    <div class="col-md-6">
    <div class="tour-label">
        <?php echo CHtml::encode($data->tour); ?> тур

    </div>

        <table class="match-all-table calendar-all">
            <tbody>
            <?php foreach($data->resultCalendar as $rcalendar):?>
                <tr <?php if(in_array($mainTeamId,array($rcalendar->team_1,$rcalendar->team_2))):?> style="background-color: #ffff4c;" <?php endif;?>>
                    <td style="width:20%;" class="hidden-xs"><?php echo Yii::app()->dateFormatter->formatDateTime($data->date,'medium',null);?></td>
                    <td style="width:20%;padding-right:10px;<?php if($rcalendar->team_1 == 7):?>color:#ff0000;<?php endif;?>" class="text-right"><?php echo $teams[$rcalendar->team_1];?></td>
                    <td class=" text-center results">
                        <?php if(!empty($rcalendar->result)):?>
                            <?php echo $rcalendar->result;?>
                        <?php else:?>
                            -:-
                        <?php endif;?>

                    </td>
                    <td style="padding-left:10px;width:40%;<?php if($rcalendar->team_2 == 7):?>color:#ff0000;<?php endif;?>"><?php echo $teams[$rcalendar->team_2];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
     </div>
  <?php if($item % 2 == 0):?>
        <div class="clearfix"></div>
        <div class="col-md-12" style="height:20px;"></div>
  <?php endif;?>
<?php endforeach;?>