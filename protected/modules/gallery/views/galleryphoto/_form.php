<?php
/* @var $this GalleryphotoController */
/* @var $model GalleryPhoto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-photo-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array("enctype" =>"multipart/form-data"),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


    <div class="control-group">
        <?php echo $form->labelEx($model,'name');?>
        <?php echo $form->textField($model,'name',array('size'=>50));?>

    </div>

    <div class="control-group">
<?php if(!$model->isNewRecord):?>

		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60,'maxlength'=>255)); ?>



<?php else:?>
    <?php
    $this->widget('CMultiFileUpload', array(
        'model'=>$model,
        'attribute'=>'img',
        'accept'=>'jpg|gif|png',
        'options'=>array(
        ),
        'denied'=>'File is not allowed',
        'max'=>10, // max 10 files


    ));
    ?>
<?php endif;?>
</div>
    <div class="control-group">

        <?php if($model->isNewRecord):?>
		   <?php echo $form->hiddenField($model,'gallery_id',array('value'=>intval($_GET['gallery_id']))); ?>
        <?php else:?>
            <?php echo $form->labelEx($model,'gallery_id'); ?>
            <?php echo $form->dropDownList($model,'gallery_id',CHtml::listData(Gallery::model()->findAll(),'id','name'));?>
            <?php echo $form->error($model,'gallery_id'); ?>
        <?php endif;?>

	</div>

    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->