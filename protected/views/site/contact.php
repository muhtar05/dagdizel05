<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Контакты',
);
?>

    <h1>Контакты</h1>
<div class="col-md-8">
<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>


    <div class="form">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); ?>

        <p class="alert alert-info">Поля с  <span class="required">*</span> обазательны для заполнения.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name',array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email',array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'subject'); ?>
            <?php echo $form->textField($model, 'subject', array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'subject'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'body'); ?>
            <?php echo $form->textArea($model, 'body', array('class'=>'form-control','rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'body'); ?>
        </div>

        <?php if (CCaptcha::checkRequirements()): ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <?php echo CHtml::submitButton('Отправить',array('class'=>'btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

<?php endif; ?>
</div>