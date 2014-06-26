<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
     if(Yii::app()->controller->id == 'news') {
         $this->widget('zii.widgets.CBreadcrumbs', array(
                   'links'=>$this->breadcrumbs,
         ));
     }
?>
	<?php echo $content; ?>
<?php $this->endContent(); ?>