<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Гостевая книга',
);
?>

<div class="row">
    <div class="col-md-8">
        <h1 class="defaulth1" style="margin-bottom:0;">Гостевая книга</h1>
      <?php $this->widget('zii.widgets.CListView', array(
	           'dataProvider'=>$dataProvider,
	           'itemView'=>'_view',
               'summaryText'=>'',
               'cssFile'=>false,
               'template'=>'{items}<div class="clearfix"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">{pager}</div>',
               'pager'=>array(
                    'cssFile'=>false,
                    'header'=>'',
                    'prevPageLabel' => '',
                    'nextPageLabel' => '',

               ),
      )); ?>
    </div>

    <div class="col-md-4">
       <a href="/guest/post/create" class="addPost">
        <div class="label-header">
            Добавить обсуждение
        </div>
       </a>
        <?php if(Yii::app()->user->isGuest):?>
          <div class="login-area">
              ВХОД
              <?php $form = $this->beginWidget('CActiveForm', array(
                  'id' => 'login-form',
                  'enableClientValidation' => true,
                  'clientOptions' => array(
                      'validateOnSubmit' => true,
                  ),
              )); ?>

                  <?php echo $form->textField($modelLogin, 'username',array('class'=>"form-control",)); ?>
                  <?php echo $form->error($modelLogin,'username');?>

                  <?php echo $form->passwordField($modelLogin, 'password',array('class'=>"form-control",'placeholder'=>'Пароль')); ?>
                  <?php echo $form->error($modelLogin,'password');?>
                  <?php echo CHtml::link('Регистрация',array('/user/registration'));?>

                  <?php echo CHtml::submitButton('Вход',array('class'=>'pull-right enter-button')); ?>
              <?php $this->endWidget(); ?>
           </div>

            <script type="text/javascript">
                $(function(){
                    $('.addPost').click(function(){
                        $(".login-area").css("border","1px solid #0085d0");
                        $("#LoginForm_username").focus();

                        return false;
                    });
                });

            </script>
        <?php else:?>



        <?php endif;?>

        <div class="label-header" style="background: url('/images/label-header2.png');margin-top: 25px;">
            Последние комментарии
        </div>
        <div class="last-comments-area">
               <?php $this->widget('LastCommentWidget');?>
        </div>

</div>
</div>


<script type="text/javascript">
    $(function(){


        $(".addrating").on('click',function(){
            var postId = $(this).parent().attr('data-id');
            var type = 1;
            var thisElement = $(this);
            sendAjaxRequest(postId,type,thisElement );
        });

        $(".subrating").on('click',function(){
            var postId = $(this).parent().attr('data-id');
            var type = 2;
            var thisElement  = $(this);
            sendAjaxRequest(postId,type,thisElement);
        });


        function sendAjaxRequest(postId,type,thisElement){
            $.ajax({
                type:"POST",
                url:"/guest/post/changeRating",
                data:'post_id='+ postId + '&type='+ type,
                success:function(data){
                    thisElement.siblings('.totalrating').html(data);
                }
            });
        }
    });
</script>
