<style>
    .born_item_test {
        height: 78px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        padding-left: 15px;
        width:218px;
    }
    .born-info-span {

    }
</style>

    <div class="col-md-12" style="margin-top: 15px;">
        <div class="ribbon" style="position: relative;">
            <span id="left-borndate-arrow" class="arrow-borndate"></span>
            <p style="text-align: center;text-transform: uppercase;">Дни рождения</p>
            <span id="right-borndate-arrow" class="arrow-borndate"></span>
        </div>


        <?php foreach($bornDateMans as $bman):?>
            <div class="born_item">
                <?php $model = $bman['type_model']::model()->findByPk($bman['id']);?>
                <?php if($model->img != ''):?>
                    <?php echo CHtml::image($model->findIMGByResolution("62x78", 'height'),'',array('class'=>'pull-right img-responsive'));?>
                <?php else:?>
                    <?php echo CHtml::image('/images/no-avatar.png','',array('class'=>' img-responsive','style'=>'width:62px;height:78px;'));?>
                <?php endif;?>
                <?php unset($model);?>
                <div class="born_info_area">
                    <?php  $data = explode(' ',$bman['fio']); ?>
<!--                    <h5 class="firstname">--><?php //echo $data[0];?><!--</h5>-->

                    <span><?php echo $data[0];?></span>
                    <span><?php echo $data[1];?></span>
                    <?php
                         $currenDateInfo = getdate();
                         $currenYear = $currenDateInfo['year'];
                         if($bman['born']>366) $currenYear +=1;
                         $timestamp = CDateTimeParser::parse($bman['born_date'],'yyyy-MM-dd HH:mm:ss');
                         $formater = new CDateFormatter('ru_RU');
                    ?>

                       <p> <?php echo $formater->format("d.MM", $timestamp);?>
                        исполнится <?php echo $currenYear - $formater->format("yyyy",$timestamp);?></p>

                </div>


            </div>
        <?php endforeach;?>
        <a href="<?php echo Yii::app()->createUrl('/team/players/allBorn/') ?>" class="pull-right all-news" >
            Все дни рождения
        </a>

    </div>

