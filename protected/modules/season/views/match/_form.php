<?php
  $teams = Teams::model()->findAll();
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-form',
    'htmlOptions' => array("enctype" =>"multipart/form-data"),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="alert">Поля с <span class="required">*</span> обязательны для заполнения.</p>

	<?php if ($model->hasErrors()): ?>
        <div class="alert alert-error"><?php echo $form->errorSummary($model); ?></div>
    <?php endif;?>


    <div class="control-group">
        <?php echo $form->labelEx($model,'season_year'); ?>
        <?php echo $form->dropDownList($model,'season_year',CHtml::listData(SeasonYear::model()->findAll(),'id','name'))?>
        <?php echo $form->error($model,'season_year'); ?>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',Lookup::items('StatusMatch'));?>
        <?php echo $form->error($model,'status'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'tournament_id'); ?>
        <?php echo $form->dropDownList($model,'tournament_id',Lookup::items('TournamentType')); ?>
        <?php echo $form->error($model,'tournament_id'); ?>
    </div>


    <div class="control-group">
        <label>Тур или раунд Кубка</label>
        <?php echo $form->textField($model,'tour',array('size'=>50,'class'=>'span6')); ?>
        <?php echo $form->error($model,'tour'); ?>
    </div>



    <div class="control-group">
        <?php echo $form->labelEx($model,'team_home'); ?>
        <?php echo $form->dropDownList($model,'team_home',CHtml::listData(Teams::model()->findAll(),'id','name')); ?>
        <?php echo $form->error($model,'team_home'); ?>

        <p class="alert alert-info">Голы вводится в формате: Алиев, 17; Вагидов, 73; </p>

        <?php echo $form->labelEx($model,'goals_home'); ?>
        <?php echo $form->textField($model,'goals_home',array('size'=>100,'class'=>'span6')); ?>
        <?php echo $form->error($model,'goals_home'); ?>


    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'team_guest'); ?>
        <?php echo $form->dropDownList($model,'team_guest',CHtml::listData(Teams::model()->findAll(),'id','name')); ?>
        <?php echo $form->error($model,'team_guest'); ?>

        <p class="alert alert-info">Голы вводится в формате: Алиев, 17; Вагидов, 73; </p>
        <?php echo $form->labelEx($model,'goals_guest'); ?>
        <?php echo $form->textField($model,'goals_guest',array('size'=>100,'class'=>'span6')); ?>
        <?php echo $form->error($model,'goals_guest'); ?>

    </div>



    <div class="control-group">
        <?php echo $form->labelEx($model,'result'); ?>
        <?php if($model->isNewRecord):?>
            <?php echo CHtml::textField('Match[result_1]','',array('size'=>2));?> :
            <?php echo CHtml::textField('Match[result_2]','',array('size'=>2));?>
        <?php else:?>
             <?php $resultInfo = explode(':',$model->result);?>
            <?php echo CHtml::textField('Match[result_1]',$resultInfo[0],array('size'=>2));?> :
            <?php echo CHtml::textField('Match[result_2]',$resultInfo[1],array('size'=>2));?>
        <?php endif;?>
        <?php echo $form->error($model,'result'); ?>
    </div>


    <div class="control-group">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('rows'=>10,'cols'=>100,'class'=>'span8')); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>



    <div class="control-group">
		<?php echo $form->labelEx($model,'date'); ?>
<!--        --><?php //$this->widget('zii.widgets.jui.CJuiDatePicker',array(
//            'language'=>'ru',
//            'model'=>$model,
//            'attribute'=>'date',
//            'options'=>array(
//                'dateFormat'=> 'yy-mm-dd',
//                'showAnim'=>'fold',
//                'changeMonth'=>true,
//                'changeYear'=> true,
//            ),
//        ));
//        ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

    <div class="control-group">
        <?php
        $this->widget('ext.timepicker.timepicker', array(
            'model'=>$model,
            'name'=>'date',
            'options'=>array(
               'dateFormat'=> 'yy-mm-dd',
               'timeFormat'=>'hh:mm:ss',
               'changeMonth'=>true,
               'changeYear'=> true,
            )

        ));
        ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'place'); ?>
        <?php echo $form->textField($model,'place',array('size'=>100,'class'=>'span6')); ?>
        <?php echo $form->error($model,'place'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'img'); ?>
        <?php echo $form->fileField($model,'img',array('class'=>'span6')); ?>
        <?php echo $form->error($model,'img'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->