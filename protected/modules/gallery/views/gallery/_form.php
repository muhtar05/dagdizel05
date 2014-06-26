<?php
/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'create_time'); ?>

        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'language'=>'ru',
            'model'=>$model,
            'attribute'=>'create_time',
            'options'=>array(
                'dateFormat'=> 'yy-mm-dd',
                'showAnim'=>'fold',
                'changeMonth'=>true,
                'changeYear'=> true,
            ),
        ));
        ?>

    </div>
    <?php echo $form->error($model, 'create_time'); ?>
    <div class="control-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->