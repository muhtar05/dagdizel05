<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array("enctype" =>"multipart/form-data"),

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'is_main'); ?>
        <?php echo $form->dropDownList($model,'is_main',array("Обычная", "Главная"), array('prompt' => '---')); ?>
        <?php echo $form->error($model,'is_main'); ?>
    </div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'shorttext'); ?>
        <?php echo $form->textArea($model,'shorttext',array('rows'=>10, 'cols'=>150)); ?>
        <?php echo $form->error($model, 'shorttext'); ?>



    </div>



    <div class="control-group">
        <?php echo $form->labelEx($model, 'text'); ?>
        <?php echo $form->error($model, 'text'); ?>
        <?php //echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
        <?php
        $this->widget('application.extensions.fckeditor.FCKEditorWidget', array(
            "model" => $model, # Data-Model
            "attribute" => 'text', # Attribute in the Data-Model
            "height" => '400px',
            "width" => '100%',
            "toolbarSet" => 'Default', # EXISTING(!) Toolbar (see: fckeditor.js)
            "fckeditor" => Yii::app()->basePath . "/../fckeditor/fckeditor.php",
            # Path to fckeditor.php
            "fckBasePath" => Yii::app()->baseUrl . "/fckeditor/",
            # Realtive Path to the Editor (from Web-Root)
            "config" => array("EditorAreaCSS" => Yii::app()->baseUrl . '/css/index.css',),
            # Additional Parameter (Can't configure a Toolbar dynamicly)
        ));
        ?>

    </div>

	<div class="control-group">
        <?php
        if (!empty($model->img) ) {
            echo CHtml::image($model->findIMGByResolution('200x200', 'width'));
        }
        ?>
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'language'=>'ru',
            'model'=>$model,
            'attribute'=>'date',
            'options'=>array(
                'dateFormat'=> 'yy-mm-dd',
                'showAnim'=>'fold',
                'changeMonth'=>true,
                'changeYear'=> true,
            ),
        ));
        ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->