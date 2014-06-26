<!--<div class="ribbon"> МАТЧ --><?php //echo $teamHomeInfo->name;?><!-- - --><?php //echo $teamGuestInfo->name;?><!--</div>-->
<div class="ribbon"> Предыдущий матч</div>

    <div class="players-take-gol hidden-xs" style="padding-left: 10px;">

        <?php if(!empty($lastMatch->goals_home)):?>
            <?php $goalsHome = explode('.',$lastMatch->goals_home);?>

            <?php foreach($goalsHome as $ghome):?>
                <span><?php echo $ghome;?></span>

            <?php endforeach;?>
        <?php endif;?>
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
            <?php $resultInfo = explode(':',$lastMatch->result);?>
            <span class="badge"><?php echo $resultInfo[0];?><span class="line">&nbsp;</span></span>
            <span class="badge-delimiter">&nbsp;</span>
            <span class="badge"><?php echo $resultInfo[1];?><span class="line">&nbsp;</span></span>
        <?php //echo $teamGuestInfo->name;?>
            <img width="64" height="62" src="<?php echo $teamGuestInfo->findIMGByResolution('64x62', 'width'); ?>" class="second-players" />
        <p class="text-center date-play">
            <?php
                $timestamp = CDateTimeParser::parse($lastMatch->date,'yyyy-MM-dd HH:mm:ss');
                $formater = new CDateFormatter('ru_RU');
                echo $formater->format("d MMMM y года", $timestamp);
            ?>
        </p>
    </div>
    <div class="players-take-gol hidden-xs" style="padding-right: 10px;">
        <?php if(!empty($lastMatch->goals_guest)):?>
            <?php $goalsGuest = explode('.',$lastMatch->goals_guest);?>
            <?php foreach($goalsGuest as $gguest):?>
                <span><?php echo $gguest;?></span>
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <br style="clear: both;"/>
