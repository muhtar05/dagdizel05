<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<div class="custom-content">
<h1>Вход</h1>

<div class="col-md-8 col-sm-8">
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username',array('class'=>"form-control")); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password',array('class'=>"form-control")); ?>
    </div>

    <div class="form-group rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton('Вход',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>