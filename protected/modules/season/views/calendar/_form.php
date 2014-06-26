<?php
/* @var $this CalendarController */
/* @var $model Calendar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'calendar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="control-group">
		<?php echo $form->labelEx($model,'tour'); ?>
		<?php echo $form->dropDownList($model,'tour',Teams::getTours()); ?>
		<?php echo $form->error($model,'tour'); ?>
	</div>

    <div class="control-group">
		<?php echo $form->labelEx($model,'season_year'); ?>
        <?php echo $form->dropDownList($model,'season_year',CHtml::listData(SeasonYear::model()->findAll(),'id','name'))?>
		<?php echo $form->error($model,'season_year'); ?>
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

    <div class="control-group match-all">

        <?php echo $form->labelEx($model,'shedule'); ?> <br />
                        <span class="addMatch badge badge-info pull-center ">
        Добавить встречу
    </span> <br /><br />

        <?php
        $teams = Teams::getAllTeams();
        $countTeams = count($teams);
        ?>
        <?php if($model->isNewRecord):?>

<!--        --><?php //for($i=1;$i<=ceil($countTeams/2);$i++):?>
<!--          --><?php //echo CHtml::dropDownList('Calendar[team_1][]','',CHtml::listData($teams,'id','name'));?>
<!--          --><?php //echo CHtml::dropDownList('Calendar[team_2][]','',CHtml::listData($teams,'id','name'));?>
<!--          --><?php //echo CHtml::textField('Calendar[result_1][]','',array('size'=>2));?><!-- :-->
<!--          --><?php //echo CHtml::textField('Calendar[result_2][]','',array('size'=>2));?>
<!---->
<!---->
<!---->
<!--          <br />-->
<!--        --><?php //endfor;?>
        <?php else:?>
            <?php foreach($calendarResults as $i=>$cresult):?>
                <?php echo CHtml::activeDropDownList($cresult,"[$i]team_1",CHtml::listData($teams,'id','name'));?>
                <?php echo CHtml::activeDropDownList($cresult,"[$i]team_2",CHtml::listData($teams,'id','name'));?>
                <?php

                   $result = explode(':',$cresult['result']);
                   $resultOne = $result[0];
                   $resultTwo = $result[1];
                ?>
                <?php echo CHtml::textField('Calendar[result_1][]',$resultOne,array('size'=>2));?> :
                <?php echo CHtml::textField('Calendar[result_2][]',$resultTwo,array('size'=>2));?>
<!--                --><?php //echo CHtml::activeTextField($cresult,"[$i]result");?>
                <br />
            <?php endforeach;?>
        <?php endif;?>

    </div>



    <br /><br />
    <div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

    $(function(){
        var teams = <?php echo CJSON::encode(CHtml::listData($teams,'id','name'));?>;
       $(".addMatch").click(function(){

           var selectTypeHome = "<select name='Calendar[team_1][]'>";
           $.each(teams,function(i){
                 selectTypeHome = selectTypeHome + "<option value='" + i + "'>" + teams[i] + "</option>";
           });
           selectTypeHome = selectTypeHome + "</select>";

           var selectTypeGuest = " <select name='Calendar[team_2][]'>";

           $.each(teams,function(i){
               selectTypeGuest = selectTypeGuest + "<option value='" + i + "'>" + teams[i] + "</option>";
           });
           selectTypeGuest = selectTypeGuest + "</select>";

           var strTextFields = ' <input size="2" type="text" value="" name="Calendar[result_1][]"> : <input size="2" type="text" value="" name="Calendar[result_2][]"  />';


           var str = '<div style="margin-bottom: 10px;" class="match-item">' + selectTypeHome + selectTypeGuest + strTextFields + '<span class="btn btn-danger" style="margin-left: 10px;"> <i class="icon-trash bigger-60"></i></span></div>';

           $(str).appendTo(".match-all");


       });
       // Delete calendar match fields
       $(".match-all").on('click','.btn-danger',function(){
          $(this).parent().remove();
       });
    });
</script>