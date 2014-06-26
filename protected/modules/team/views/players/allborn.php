<h1 class="customh1">Все дни рождения</h1>
<ul class="players" style="list-style: none;">
<?php foreach($bornDateMans as $bman):?>

    <?php $model = $bman['type_model']::model()->findByPk($bman['id']);?>
    <li class="col-md-4 col-sm-6 col-xs-12 player-block">
        <div class="player-item">
            <a href="<?php echo $this->createUrl('players/view',array('id'=>$model->id));?>">
                <div class="player-thumb">
            <span class="amplua">

                <?php
                $currenDateInfo = getdate();
                $currenYear = $currenDateInfo['year'];
                if($bman['born']>366)
                    $currenYear +=1;

                $timestamp = CDateTimeParser::parse($bman['born_date'],'yyyy-MM-dd HH:mm:ss');
                $formater = new CDateFormatter('ru_RU');
                echo $formater->format("d MMMM ", $timestamp).$currenYear;
                ?>
                <br />
                исполнится <?php echo $currenYear - $formater->format("yyyy",$timestamp);?>  лет
            </span>
                    <a href="/team/players/view/id/<?php echo $model->id;?>">
                        <div class="player-thumb-photo">
                            <?php if($model->img !=''):?>
                                <?php echo CHtml::image($model->findIMGByResolution("182x162", 'width'),'',array('class'=>'img-responsive pimg-photo'));?>
                            <?php else:?>
                                <?php echo CHtml::image('/images/no-avatar.png','',array('class'=>'img-responsive pimg-photo'));?>

                            <?php endif;?>
                        </div>
                    </a>
                    <!--           -->

                </div>
                <div class="player-caption" style="min-height: 76px">
                    <?php echo $model->fio;?>
                </div>
            </a>
        </div>

    </li>
    <?php unset($model);?>
<?php endforeach;?>
</ul>