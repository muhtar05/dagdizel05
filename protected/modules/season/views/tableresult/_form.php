<?php
/* @var $this TableresultController */
/* @var $model TableResult */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'table-result-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_1'); ?>
		<?php echo $form->textField($model,'team_1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_2'); ?>
		<?php echo $form->textField($model,'team_2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_3'); ?>
		<?php echo $form->textField($model,'team_3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_4'); ?>
		<?php echo $form->textField($model,'team_4',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_5'); ?>
		<?php echo $form->textField($model,'team_5',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_6'); ?>
		<?php echo $form->textField($model,'team_6',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_6'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_7'); ?>
		<?php echo $form->textField($model,'team_7',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_7'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_8'); ?>
		<?php echo $form->textField($model,'team_8',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_8'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_9'); ?>
		<?php echo $form->textField($model,'team_9',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_9'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_10'); ?>
		<?php echo $form->textField($model,'team_10',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_10'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_11'); ?>
		<?php echo $form->textField($model,'team_11',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_11'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_12'); ?>
		<?php echo $form->textField($model,'team_12',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_12'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_13'); ?>
		<?php echo $form->textField($model,'team_13',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_13'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_14'); ?>
		<?php echo $form->textField($model,'team_14',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_14'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_15'); ?>
		<?php echo $form->textField($model,'team_15',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_15'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_16'); ?>
		<?php echo $form->textField($model,'team_16',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_16'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_17'); ?>
		<?php echo $form->textField($model,'team_17',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_17'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_18'); ?>
		<?php echo $form->textField($model,'team_18',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'team_18'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->