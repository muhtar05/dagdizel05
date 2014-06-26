<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
)); ?>

     <?php ?>

    <?php echo $form->textArea($model,'text',array('rows'=>3,'class'=>'form-control','placeholder'=>'Написать комментарий')); ?>
    <?php echo $form->error($model,'text');?>
   <?php //if(Yii::app()->user->isGuest):?>
    <?php if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest): ?>

        <?php echo $form->labelEx($model,'verifyCode'); ?>
        <div>
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
     <?php endif;?>
    <?php //endif;?>
    <?php echo $form->error($model,'verifyCode'); ?>
    <?php echo $form->hiddenField($model,'parent_id',array('size'=>10,'value'=>0)); ?>
    <?php echo CHtml::submitButton('Оставить комментарий',array('class'=>'enter-button-comment pull-right')); ?>

<?php $this->endWidget(); ?>