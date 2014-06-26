<?php
/* @var $this CalendarController */
/* @var $data Calendar */
?>

<div class="view">

	  <h1><?php echo CHtml::encode($data->tour); ?> тур </h1>

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
	<br />
</div>