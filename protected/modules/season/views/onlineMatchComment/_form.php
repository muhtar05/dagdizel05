
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'online-match-comment-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
      //  'class'=>'form-inline',
    )
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
         <?php echo $form->labelEx($model,'type_comment'); ?>
         <?php echo $form->dropDownList($model,'type_comment',Lookup::items('OnlineCommentType'));?>

        <div class="players-select" style="display:none;">
          <label>Игрок</label>
            <?php
            $players = OnlineMatchPlayers::model()->findAll(array(
                'condition'=>'match_id='.$_GET['id'],
            ));
            ?>
            <select name="playerId">
                <?php foreach($players as $p):?>
                    <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
                <?php endforeach;?>
            </select>

        </div>

    </div>


    <div class="form-group">
         <?php echo $form->labelEx($model,'minute'); ?>
         <?php echo $form->textField($model,'minute',array('class'=>'form-control','size'=>10));?>
    </div>

    <div class="form-group">
                   <?php echo $form->labelEx($model,'text'); ?>
		           <?php echo $form->textArea($model,'text',array('rows'=>2, 'cols'=>20,'class'=>'form-control')); ?>
                   <?php echo $form->hiddenField($model,'match_id',array('value'=>$_GET['id'])); ?>
	               <?php echo $form->error($model,'text'); ?>

	</div>

    <div class="col-xs-2 col-xs-offset-10" style="margin-top:10px;">
        <?php echo CHtml::ajaxButton ("Добавить",
            CController::createUrl('onlineMatchComment/create'),
            array(
                'type'=>'POST',
                'data'=>'js:jQuery(this).parents("form").serialize()',
                'update' => '#data'
            ),
            array(
                'class'=>'btn btn-info',
            )

        );
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->