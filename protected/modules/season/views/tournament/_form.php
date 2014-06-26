<div class="form">

  <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'tournament-form',
	   'enableAjaxValidation'=>false,
  )); ?>

	<p class="alert alert-danger">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
<div class=" control-group">
 <table>
     <tr>
         <td>
             <?php echo $form->labelEx($model,'place'); ?>
             <?php echo $form->textField($model,'place',array('size'=>5)); ?>
             <?php echo $form->error($model,'place'); ?>
         </td>

         <td>
             <?php echo $form->labelEx($model,'team_name'); ?>
             <?php echo $form->dropDownList($model,'team_name',CHtml::listData(Teams::model()->findAll(),'id','name')); ?>
             <?php echo $form->error($model,'team_name'); ?>
         </td>

         <td>
             <?php echo $form->labelEx($model,'total_matches'); ?>
             <?php echo $form->textField($model,'total_matches',array('size'=>5)); ?>
             <?php echo $form->error($model,'total_matches'); ?>
         </td>

         <td>
             <?php echo $form->labelEx($model,'win'); ?>
             <?php echo $form->textField($model,'win',array('size'=>5)); ?>
             <?php echo $form->error($model,'win'); ?>
         </td>

         <td>
             <?php echo $form->labelEx($model,'draw'); ?>
             <?php echo $form->textField($model,'draw',array('size'=>5)); ?>
             <?php echo $form->error($model,'draw'); ?>

         </td>

         <td>
             <?php echo $form->labelEx($model,'defeat'); ?>
             <?php echo $form->textField($model,'defeat',array('size'=>5)); ?>
             <?php echo $form->error($model,'defeat'); ?>

         </td>

         <td>
             <?php echo $form->labelEx($model,'goal_stat'); ?>
             <?php echo $form->textField($model,'goal_stat',array('size'=>15,'maxlength'=>50)); ?>
             <?php echo $form->error($model,'goal_stat'); ?>
         </td>

         <td>
             <?php echo $form->labelEx($model,'points'); ?>
             <?php echo $form->textField($model,'points',array('size'=>5)); ?>
             <?php echo $form->error($model,'points'); ?>
         </td>

         <td>
             <?php echo $form->labelEx($model,'season_id'); ?>
             <?php echo $form->dropDownList($model,'season_id',CHtml::listData(SeasonYear::model()->findAll(),'id','name'))?>
             <?php echo $form->error($model,'season_id'); ?>
         </td>


     </tr>



 </table>
 </div>
	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->