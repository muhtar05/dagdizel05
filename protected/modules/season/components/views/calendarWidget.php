<div class="widget_table_calendar">
<ul id="myTab" class="nav nav-tabs">
  <?php foreach($calendarTours as $tour):?>
    <li <?php if($currentTour == $tour->tour):?> class="active" <?php endif;?>
        <?php if(in_array($tour->tour,$tourArray)):?> style="display:block" <?php else:;?> style="display: none;" <?php endif;?>><a href="#tour_<?php echo $tour->tour;?>" data-toggle="tab"><?php echo $tour->tour;?> тур</a></li>
  <?php endforeach;?>
</ul>

<div id="myTabContent" class="tab-content">
    <?php foreach($calendarTours as $tour):?>
    <div class="tab-pane  <?php if($currentTour == $tour->tour):?> active <?php endif;?>" id="tour_<?php echo $tour->tour;?>">
        <span class="tour-date"><?php echo Yii::app()->dateFormatter->formatDateTime($tour->date,'full',null);?></span>
        <table class="table tour_teams table-calendar table-responsive">
            <thead>
               <td class="col-md-5"></td>
               <td class="col-md-2"></td>
               <td class="col-md-5"></td>
            </thead>
            <tbody>
            <?php foreach($tour->resultCalendar as $rcalendar):?>
            <tr <?php if(in_array($mainTeamId,array($rcalendar->team_1,$rcalendar->team_2))):?> style="background-color: #ffff4c;" <?php endif;?>>
                <td class="text-right"><?php echo $teams[$rcalendar->team_1];?></td>
                <td class="color text-center">
                    <?php if(!empty($rcalendar->result)):?>
                        <?php echo $rcalendar->result;?>
                    <?php else:?>
                        -:-
                    <?php endif;?>

                </td>
                <td class=""><?php echo $teams[$rcalendar->team_2];?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>


    </div>

    <?php endforeach;?>
</div>


</div>

<div class="options-details">
    <a href="/season/calendar/">полная <br />
    <img src="<?php echo Yii::app()->baseUrl;?>/images/arrow-bottom.png" />
    </a>

</div>


<script type="text/javascript">
    $(function(){

        $('#myTab a').click(function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var tourClick = href.substring(6);
            $("#myTab li").each(function(){
                $(this).css("display",'none');
            });

            $("#myTab li a").each(function(i){
                if(tourClick == $(this).attr('href').substring(6)){
                    $(this).parent().prev().css("display","block");
                    $(this).parent().css("display","block");
                    $(this).parent().next().css("display","block");
                }
            });

        });
    });
</script>