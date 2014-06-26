<style>
   .progress {
       background-color:#fff;
       border-radius: 0;
       -webkit-box-shadow: none;
       box-shadow: none;
   }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h3 class="ribbon" style="text-transform: uppercase; text-align: center;">
            Опрос
        </h3>
      <div class="poll_widget">
          <span class="header_title">
               <?php echo $model->question_text;?>
          </span>

        <div class="poll_form_area">

            <?php if(Yii::app()->request->cookies['poll_'.$model->id]):?>
                <?php foreach($model->choice as $ch):?>
                     <?php echo $ch->choice_text;?>
                     <?php $procent = round((100 / $total) * $ch->votes); ?>
                    <div class="pull-right"><?php echo $ch->votes;?>(<?php echo $procent;?>%)</div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo intval($procent);?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo intval($procent);?>%;"> </div>

                    </div>


                <?php endforeach;?>
                Проголосовало:<?php echo $total;?>

            <?php else:?>
            <div class="poll_form">
                <?php echo CHtml::beginForm('/poll/question/view/id/'.$model->id,'POST');?>

                <?php echo CHtml::radioButtonList('choice','',CHtml::listData($model->choice,'id','choice_text'));?>


            </div>
                <?php echo CHtml::submitButton('Голосовать',array('class'=>'poll_button'));?>
                <?php echo CHtml::endForm();?>

            <?php endif;?>



        </div>

      </div>


        <a href="<?php echo Yii::app()->createUrl('/poll/question/') ?>" class="pull-right all-news" >
            Архив опросов
        </a>
    </div>
</div>