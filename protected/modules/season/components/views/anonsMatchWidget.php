<div class="ribbon" >Следующий матч</div>
<!--<table class="table-responsive table-anons">-->
<!--    <tr>-->
<!--        <td class="text-center" style="color:#28438e;" class="text-center">--><?php //echo $teamHomeInfo->name;?><!--</td>-->
<!--        <td class="text-center"> </td>-->
<!--        <td class="text-center" style="color:#28438e;" class="text-center" style="color:#28438e;">--><?php //echo $teamGuestInfo->name;?><!--</td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td class="text-center">-->
<!--              <img src="--><?php //echo $teamHomeInfo->findIMGByResolution('64x62', 'width'); ?><!--" />-->
<!--        </td>-->
<!--        <td class="text-center">-->
<!--        </td>-->
<!--        <td class="text-center">-->
<!--            <img src="--><?php //echo $teamGuestInfo->findIMGByResolution('64x62', 'width'); ?><!--" />-->
<!--        </td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td class="text-center">-->
<!--        </td>-->
<!--        <td class="text-center">-->
<!--            --><?php //echo Yii::app()->dateFormatter->formatDateTime($anonsMatch->date,'long','short');?>
<!--        </td>-->
<!--        <td class="text-center">-->
<!--        </td>-->
<!--    </tr>-->
<!--</table>-->


<div class="players-take-gol hidden-xs" style="padding-left: 10px;">
</div>
<div class="commands-and-result">
    <table>
        <tr>
            <td class="text-center" style="width:40%"><?php echo $teamHomeInfo->name;?></td>
            <td style="width:20%"></td>
            <td class="text-center" style="width:40%"><?php echo $teamGuestInfo->name;?></td>
        </tr>
    </table>

    <img width="64" height="62" src="<?php echo $teamHomeInfo->findIMGByResolution('64x62', 'width'); ?>" class="first-players" />
    <span class="badge">&nbsp;</span></span>
    <span class="badge-delimiter">&nbsp;</span>
    <span class="badge">&nbsp;</span>
    <img width="64" height="62" src="<?php echo $teamGuestInfo->findIMGByResolution('64x62', 'width'); ?>" class="second-players" />
    <p class="text-center date-play">

        <?php
        $timestamp = CDateTimeParser::parse($anonsMatch->date,'yyyy-MM-dd HH:mm:ss');
        $formater = new CDateFormatter('ru_RU');
        echo $formater->format("d MMMM y года , HH:mm", $timestamp);
        ?>
    </p>
</div>
<div class="players-take-gol hidden-xs" style="padding-right: 10px;">

</div>
<br style="clear: both;"/>
