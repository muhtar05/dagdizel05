<?php
/* @var $this CarouselController */
/* @var $model Carousel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carousel-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array("enctype" =>"multipart/form-data"),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="control-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'url'); ?>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'url'); ?>
    </div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->