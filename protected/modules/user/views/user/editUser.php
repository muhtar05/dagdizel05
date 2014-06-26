<h1>Редактирование профиля</h1>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'htmlOptions' => array("enctype" =>"multipart/form-data"),
    )); ?>

    <?php if($form->errorSummary($model)):?>
        <div class="alert-danger alert">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php endif;?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'avatar'); ?>
        <?php echo $form->fileField($model,'avatar');?>
        <?php echo $form->error($model,'avatar'); ?>
    </div>


    <div class="control-group">
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->