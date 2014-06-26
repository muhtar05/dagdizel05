<?php
$this->breadcrumbs=array(
	'Опросы'=>array('index'),
	$model->id,
);

?>

<h1><?php echo $model->question_text;?></h1>
<?php if(Yii::app()->request->cookies['poll_'.$model->id]):?>
    <?php foreach($model->choice as $ch):?>
        <?php echo $ch->choice_text;?>
        <?php $procent = intval((100 / $total) * $ch->votes); ?>
        <div class="pull-right"><?php echo $ch->votes;?>(<?php echo $procent;?>%)</div>
        <div class="progress" >
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $procent;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $procent;?>%;">

            </div>

        </div>

    <?php endforeach;?>

<?php else:?>
    <?php echo CHtml::beginForm('/poll/question/view/id/'.$model->id,'POST');?>

    <?php echo CHtml::radioButtonList('choice','',CHtml::listData($model->choice,'id','choice_text'));?> <br />
    <?php echo CHtml::submitButton('Проголосовать',array('class'=>'enter-button-comment'));?>
    <?php echo CHtml::endForm();?>

<?php endif;?>

Проголосовало:<?php echo $total;?>

