<h1 class="customh1">Онлайн трансляция матча</h1>

<ul class="nav nav-pills protokol-match">
    <li <?php if(Yii::app()->controller->action->id !== 'online'):?> class="active" <?php endif;?>><?php echo CHtml::link('Обзор',array('view','id'=>$model->id));?></li>
    <li <?php if(Yii::app()->controller->action->id == 'online'):?> class="active" <?php endif;?>><?php echo CHtml::link('Текстовая трансляция',array('online','id'=>$model->id));?></li>
</ul>


<div class="row">
    <div class="col-md-9">
       <div class="row">
           <div class="col-md-12">
              <div class="match-info">
                <div class="ribbon">Матч <?php echo $teamHomeInfo->name;?> - <?php echo $teamGuestInfo->name;?></div>
                  <div class="row">
                      <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2" style="margin-top: 18px;">
                          <div class="players-take-gol hidden-xs" style="padding-left: 10px;">
                              <?php
                              $goalsPlayers = explode('.',$model->goals_home);
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

              <div class="online-sprite-area">
                  <span class="group goals">
                      <span class="icon-sprite-online goal"></span>
                      <span>Гол</span>
                  </span>


                  <span class="group goals">
                      <span class="icon-sprite-online change"></span>
                      <span>Замена</span>
                  </span>



                  <span class="group goals">
                      <span class="icon-sprite-online yellow_card"></span>
                      <span>Желтая карточка</span>
                  </span>

                  <span class="group goals">
                      <span class="icon-sprite-online red_card"></span>
                      <span>Красная карточка</span>
                  </span>

                  <span class="group goals">
                      <span class="icon-sprite-online corner"></span>
                      <span>Угловой</span>
                  </span>


                  <span class="group goals">
                      <span class="icon-sprite-online time"></span>
                      <span>Время</span>
                  </span>


              </div>

              </div>
           </div>
       </div>

           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-8 col-sm-8">
                     <?php foreach ($dataProvider->getData() as $online_comment):?>

                      <div class="col-md-12 col-sm-12 online-comment-item <?php echo $online_comment->getColorType();?>">
                          <div class="row">
                             <div class="col-md-1 col-sm-1 type-comment">
                                 <?php if($online_comment->type_comment>1):?>

                                     <?php echo $online_comment->getCommentType();?>
                                 <?php else:?>
                                 <?php endif;?>
                             </div>

                             <div class="col-md-1 col-sm-1 minute-comment">
                                <?php if(!empty($online_comment->minute)):?>
                                      <?php echo CHtml::encode($online_comment->minute); ?>'
                                 <?php else:?>
                                 <?php endif;?>
                             </div>

                            <div class="col-md-10 col-sm-8 text-comment">
                               <?php echo CHtml::encode($online_comment->text); ?>
                            </div>
                          </div>
                      </div>
                    <?php endforeach;?>
                    </div>


              <div class="col-md-4 col-sm-4">
                   <div class="all-label-teams">
                      Основные составы
                   </div>

                   <div class="team-label">
                       <?php  echo Teams::model()->findByPk($model->team_home)->name;?>
                   </div>

                  <div class="playersHomeArea players-area">
                       <?php foreach($playersHome as $phome):?>
                           <div>
                              <span class="player-number"><?php echo $phome->number;?></span>
                              <span class="player-label"><?php echo $phome->name;?></span>
                              <?php foreach($phome->events as $event):?>
                                   <?php echo $event->getEventRender();?>

                              <?php endforeach;?>
                           </div>
                       <?php endforeach;?>
                </div>


                <div class="team-label">
                    <?php  echo Teams::model()->findByPk($model->team_guest)->name;?>
                </div>


                <div class="playersGuestArea players-area">

                    <?php foreach($playersGuest as $pguest):?>
                        <div>
                           <span class="player-number"><?php echo $pguest->number;?></span>
                           <span class="player-label"><?php echo $pguest->name;?></span>

                            <?php foreach($pguest->events as $event):?>
                                <?php echo $event->getEventRender();?>
                            <?php endforeach;?>
                        </div>
                    <?php endforeach;?>
                </div>
              </div>

            </div>
       </div>



    </div>
    <div class="col-md-3 col-sm-12 hidden-xs hidden-sm">
        <?php $this->widget('season.components.TournamentWidget'); ?>
        <?php $this->widget('season.components.CalendarWidget'); ?>
    </div>

</div>

<?php if($model->status == Match::STATUS_MATCH_ONLINE):?>
<script type="text/javascript">
    function fresh() {
        location.reload();
    }
    setInterval("fresh()",60000);
</script>
<?php endif;?>






