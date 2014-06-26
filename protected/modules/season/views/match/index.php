<style>
    .match-all-table tr td {
             padding-top: 4px;
             padding-bottom: 4px;
             padding-left: 18px;
             padding-right: 18px;
         }
</style>
<?php
// Получаем номер текущего месяца
$dateInfo = getdate();
$currentMonth = $dateInfo['mon'];

$this->breadcrumbs=array(
	'Матчи',
);

?>

<h1 class="customh1">Протоколы матчей </h1>
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


<div class="panel-group" id="accordion">
    <?php foreach($months as $month):?>
         <div class="panel panel-default">
           <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $month['month']?>">
               <?php echo CalendarHelper::getRussianNameMonth($month['month']);?> <?php echo $month['year'];?>
           </div>

         <div id="collapse_<?php echo $month['month']?>" class="panel-collapse collapse ">
            <div class="panel-body">
                <table class="match-all-table">
                    <tbody>
                        <?php foreach($matches as $match):?>
                            <?php $dateInfoMatch = getdate(strtotime($match->date));?>
                            <?php $currentMatch = $dateInfoMatch['mon'];?>
                            <?php if($month['month'] == $currentMatch):?>
                                 <tr>
                                    <td style="width:15%;" class="hidden-xs">
                                       <?php $timestamp = CDateTimeParser::parse($match->date,'yyyy-MM-dd HH:mm:ss');
                                             $formater = new CDateFormatter('ru_RU');
                                       ?>

                                        <?php echo $formater->format("d MMMM", $timestamp); ?>
                                    </td>

                                     <td style="width: 10%" class="hidden-xs">
                                         <span class="match-icon <?php echo $match->getMatchResult();?>"></span>
                                     </td>

                                     <td>
                                        <?php echo $teams[$match->team_home];?>
                                    </td>

                                    <td class="results" style="font-size: 18px;color: #000;">
                                        <?php if(!empty($match->result)):?>
                                           <?php echo CHtml::link($match->result,array('view','id'=>$match->id));?>
                                        <?php else:?>
                                           <?php echo CHtml::link('-:-',array('view','id'=>$match->id));?>
                                        <?php endif;?>
                                    </td>

                                     <td>
                                        <?php echo $teams[$match->team_guest];?>
                                    </td>

                                     <td class="results tour-item" data-id="<?php echo $match->tour;?>" style="width: 25%;">
                                         <?php if($match->tournament_id == 2):?>
                                             Кубок России
                                         <?php else:?>
                                         <?php echo $match->tour;?> тур
                                         <?php endif;?>
                                    </td>

                                 </tr>

                        <?php endif;?>
                       <?php endforeach;?>
                    </tbody>
                </table>

            </div>
         </div>
        </div>
    <?php endforeach;?>

</div>



<script type="text/javascript">
    $(function(){
       $('.panel-heading').on('touchstart',function(e){
           $(this).siblings('.panel-body').toogle();
       });

       var lastTour = <?php echo $lastMatch->tour;?>;
       $('.tour-item').each(function(){
           if(lastTour == $(this).attr('data-id'))
           {
               $(this).parents('.panel-collapse').addClass('in');
           }

       });



    });
</script>