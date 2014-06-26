<?php
$this->breadcrumbs=array(
	'Протоколы матчей'=>array('index'),
    $teamHomeInfo->name.' - '.$teamGuestInfo->name,
);
?>
<h1 class="customh1">Протоколы матчей </h1>

<ul class="nav nav-pills protokol-match">
    <li class="active"><?php echo CHtml::link('Обзор',array('view','id'=>$model->id));?></li>
    <?php if($model->countComment>0):?>
        <li><?php echo CHtml::link('Текстовая трансляция',array('online','id'=>$model->id));?></li>
    <?php endif;?>
</ul>

 <div class="row">
     <div class="col-md-9">
         <div class="match-info">
           <div class="ribbon">Матч <?php echo $teamHomeInfo->name;?> - <?php echo $teamGuestInfo->name;?></div>
             <div class="row">
              <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2" style="margin-top: 18px;">
                 <div class="players-take-gol hidden-xs" style="padding-left: 10px;">
                  <?php
                    $goalsPlayers = explode(';',$model->goals_home);
                    foreach($goalsPlayers as $gplayer){
                        if(!empty($gplayer))
                            echo '<span>'.$gplayer.'</span>';
                    }
                  ?>
              </div>
                 <div class="commands-and-result-info">
                  <img src="<?php echo $teamHomeInfo->findIMGByResolution('64x62', 'width'); ?>" class="first-players" />
                  <?php $resultInfo = explode(":",$model->result);?>
                      <span class="badge"><?php echo $resultInfo[0];?><span class="line">&nbsp;</span></span>
                      <span class="badge-delimiter">&nbsp;</span>
                      <span class="badge"><?php echo $resultInfo[1];?><span class="line">&nbsp;</span></span>
                      <img src="<?php echo $teamGuestInfo->findIMGByResolution('64x62', 'width'); ?>" class="second-players" />
                      <p class="text-center date-play">
                          <?php
                              $formatter = new CDateFormatter('ru_RU');
                              echo $formatter->format("d MMMM yyyy",$model->date);
                          ?>
                      </p>
              </div>

                 <div class="players-take-gol hidden-xs" style="padding-right: 10px;">
                    <?php
                    $goalsPlayers = explode('.',$model->goals_guest);
                    foreach($goalsPlayers as $gplayer){
                        if(!empty($gplayer))
                            echo '<span>'.$gplayer.'</span>';
                    }
                    ?>
                </div>
             </div>
            </div>


            <br style="clear: both;"/>

            <img src="<?php echo $model->findIMGByResolution('505x315', 'width'); ?>" alt="" class="img-responsive media-object" style="margin: 0 auto;">
             <br style="clear: both;"/>
           <?php echo nl2br($model->description);?>

         </div>
</div>

<div class="col-md-3 hidden-xs hidden-sm">
    <?php $this->widget('season.components.TournamentWidget'); ?>
    <?php $this->widget('season.components.CalendarWidget'); ?>
</div>
</div>

