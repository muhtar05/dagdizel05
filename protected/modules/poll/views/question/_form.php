<style>
    .icon-edit,.icon-remove {
        padding:10px;
    }
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поле с звездочкой обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'question_text'); ?>
		<?php echo $form->textArea($model,'question_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'question_text'); ?>
	</div>


	<div class="control-group">
		<?php echo $form->labelEx($model,'show'); ?>
		<?php echo $form->dropDownList($model,'show',array(Question::SHOW_QUESTION_NO=>'Скрыть', Question::SHOW_QUESTION_YES=>'Показать')); ?>
		<?php echo $form->error($model,'show'); ?>
	</div>

  <?php if(!$model->isNewRecord):?>
    <div class="control-group choice-items">
       <div id="data">

            <?php foreach($model->choice as $ch):?>
               <div>
                  <span class="choice-text"><?php echo $ch->choice_text;?></span>
                    <span data-id="<?php echo $ch->id;?>" class="icon icon-edit"></span>
                    <span data-id="<?php echo $ch->id;?>" class="icon icon-remove"></span>
               </div>

        <?php endforeach;?>
       </div>
        <a id="add-choice" href="#">Добавить вариант</a>
    </div>
  <?php endif;?>

	<div class="control-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div class="choice-dialog" title="Добавление нового варианта" style="display:none;">
    <form>
        <div class="control-group">
            <label for="Choice_choice_text" class="required">Вариант <span class="required">*</span></label>
          <textarea rows="6" cols="50" class="span6" name="Choice[choice_text]" id="Choice_choice_text"></textarea>
          <input type="hidden" value="<?php echo $model->id;?>" name="Choice[question_id]" />
        </div>

        <?php echo CHtml::ajaxButton ("Добавить",
            CController::createUrl('/poll/choice/create'),
            array(
                'type'=>'POST',
                'data'=>'js:jQuery(this).parents("form").serialize()',
                'success'=>'js:function(data){
                      $(".choice-dialog").dialog("close");
                      $("#data").html(data);
                }',
            ),
            array(
                'class'=>'btn btn-info',
            )

        );
        ?>
    </form>
</div>


<div class="choice-dialog-edit" title="Редактирование" style="display:none;">
    <form>
        <div class="control-group">
            <label for="Choice_choice_text" class="required">Вариант <span class="required">*</span></label>
            <textarea rows="6" cols="50" class="span6" name="Choice[choice_text]" id="Choice_choice_text"></textarea>
            <input type="hidden" value="<?php echo $model->id;?>" name="Choice[question_id]" />
            <input type="text"  name="Choice[id]" id="Choice_id" />
        </div>

        <?php echo CHtml::ajaxButton ("Сохранить",
            CController::createUrl('/poll/choice/update'),
            array(
                'type'=>'POST',
                'data'=>'js:jQuery(this).parents("form").serialize()',
                'success'=>'js:function(data){
                      $(".choice-dialog-edit").dialog("close");
                      $("#data").html(data);
                }',
            ),
            array(
                'class'=>'btn btn-info',
            )

        );
        ?>
    </form>
</div>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){


    $(".choice-items").on('click','.icon-edit',function(){
        var choiceId = $(this).attr('data-id');
        var choiceText = $(this).siblings('.choice-text').text();
        $(".choice-dialog-edit #Choice_choice_text").val(choiceText);
        $(".choice-dialog-edit #Choice_id").val(choiceId);
        $(".choice-dialog-edit").dialog({
            width:600,
            height:400
        });

    });

    $(".choice-items").on('click','.icon-remove',function(){
        var choiceId = $(this).attr('data-id');

        $.ajax({
            data:'id='+ choiceId,
            url:"/poll/choice/delete",
            success:function(data){

            },
            error:function(data){
                alert(data);
            }
        });

        $(this).parent().remove();


    });

    $("#add-choice").on('click',function(e){
        e.preventDefault();
        $(".choice-dialog #Choice_choice_text").val('');
        $(".choice-dialog").dialog({
            width:600,
            height:400
        });

    });


    });

</script>