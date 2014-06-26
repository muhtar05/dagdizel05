<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php if($model->getErrors()):?>
    <div class="alert alert-danger">
	   <?php echo $form->errorSummary($model); ?>
    </div>
    <?php endif;?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>



    <div class="form-group">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

<!--    <div class="form-group">-->
<!--        --><?php //echo $form->labelEx($model,'text'); ?>
        <?php
//        $this->widget(
//            'ext.jmarkitup.JHtmlEditor',
//            array(
//                'model'=>$model,
//                'attribute'=>'text',
//                'theme'=>'markitup',
//                'htmlOptions'=>array('rows'=>15, 'cols'=>70),
//                'options'=>array(
//                    'previewParserPath'=>Yii::app()->urlManager->createUrl('/guest/post/preview')
//                )
//            ));
//        ?>
<!--    </div>-->




    <div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->