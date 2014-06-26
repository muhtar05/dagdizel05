<li class="col-md-4 col-sm-6 col-xs-12 mix player-block <?php echo $data::getAmplua($data->amplua_id);?>">
    <div class="player-item">
        <a href="<?php echo $this->createUrl('players/view',array('id'=>$data->id));?>">
        <div class="player-thumb">
            <span class="amplua">
                <?php echo $data::getAmpluaName($data->amplua_id);?></span>
            <b><?php echo $data->number;?></b>
            <a href="/team/players/view/id/<?php echo $data->id;?>">
            <div class="player-thumb-photo">
               <?php if($data->img !=''):?>
                   <?php echo CHtml::image($data->findIMGByResolution("182x162", 'width'),'',array('class'=>'img-responsive pimg-photo'));?>
               <?php else:?>
                   <?php echo CHtml::image('/images/no-avatar.png','',array('class'=>'img-responsive pimg-photo'));?>

               <?php endif;?>
            </div>
            </a>
<!--           -->

        </div>
        <div class="player-caption">
             <?php echo $data->fio;?>
        </div>
       </a>
    </div>

</li>