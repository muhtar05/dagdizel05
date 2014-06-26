<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="control-group">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->dropDownList($model,'parent_id',Menu::getParentMenu()); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'href'); ?>
        <?php echo $form->dropDownList($model,'href',Menu::getUrlsAlias()); ?>

		<?php echo $form->error($model,'href'); ?>
	</div>


    <div class="control-group">
        <?php echo $form->labelEx($model,'seo_title'); ?>
        <?php echo $form->textField($model,'seo_title',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'seo_title'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'seo_keywords'); ?>
        <?php echo $form->textArea($model,'seo_keywords',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'seo_keywords'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'seo_description'); ?>
        <?php echo $form->textArea($model,'seo_description',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'seo_description'); ?>
    </div>


    <div class="control-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить' ,array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->