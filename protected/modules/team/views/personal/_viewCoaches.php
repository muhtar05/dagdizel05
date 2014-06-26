<li class="col-md-4 col-sm-6 col-xs-12 mix player-block">
    <div class="player-item">
        <div class="player-thumb">
            <div class="player-thumb-photo">
                <?php if($data->img !=''):?>
                    <?php echo CHtml::image($data->findIMGByResolution("182x162", 'width'),'',array('class'=>'img-responsive pimg-photo'));?>
                <?php else:?>
                    <?php echo CHtml::image('/images/no-avatar.png','',array('class'=>'img-responsive pimg-photo'));?>

                <?php endif;?>
            </div>
        </div>
        <div class="personal-caption">
            <?php echo CHtml::link($data->fio,array('/team/coaches/view','id'=>$data->id));?>
        </div>

    </div>

</li>