<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'comment-form',
        'enableAjaxValidation'=>true,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'text'); ?>
        <?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'text'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array(Comment::STATUS_PENDING=>'На модерации', Comment::STATUS_APPROVED=>'Опублиокван')); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>



    <div class="control-group">

        <?php echo $form->hiddenField($model,'parent_id',array('size'=>10,'value'=>0)); ?>

    </div>


    <div class="control-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить' : 'Сохранить',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->