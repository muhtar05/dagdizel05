<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'fio'); ?>
		<?php echo $form->textField($model,'fio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fio'); ?>
	</div>


    <div class="control-group">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'roleId'); ?>
		<?php echo $form->dropDownList($model,'roleId',array(User::ADMIN=>'Администратор',
                                                             User::USER=>'Пользователь',
                                                             User::MODERATOR=>'Модератор',
        )); ?>
		<?php echo $form->error($model,'roleId'); ?>
	</div>



    <div class="control-group">
		<?php echo $form->labelEx($model,'ban'); ?>
		<?php echo $form->dropDownList($model,'ban',array(User::USER_ACTIVE=>'Активен',User::USER_BANNED=>'Забанен')); ?>
		<?php echo $form->error($model,'ban'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->