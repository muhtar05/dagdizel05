<?php

$this->breadcrumbs=array(
    'Гостевая книга',
);
?>

<div class="row">
    <div class="col-md-8">

        <div class="post-item">
            <h3><?php echo CHtml::link(CHtml::encode($model->title), array('view', 'id'=>$model->id)); ?></h3>
            <div class="col-md-12 col-sm-12 col-xs-12 published-author" >
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-3 date-post">
                       <?php
                           $timestamp = CDateTimeParser::parse($model->date,'yyyy-MM-dd HH:mm:ss');
                           $formater = new CDateFormatter('ru_RU');
                           echo $formater->format("d MMM yyyyг", $timestamp);
                        ?>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-3 hidden-xs">Опубликовал:
                        <span class="author-name"><?php echo $model->author->username;?></span>
                    </div>

                <span class="post-rating" data-id="<?php echo $model->id;?>">
                    <span class="addrating-comment"></span>
                    <span class="totalrating-comment"><?php echo $model->countPostRating();?></span>
                    <span class="subrating--comment"></span>
                </span>
               </div>
            </div>
              <div style="padding:10px;">
               <?php echo $model->text;?>
              </div>

            <div class="all-comments-info">
                Комментариев:<?php echo  $model->commentCount ; ?>/ Просмотров:<?php echo $model->browsing;?>
            </div>

        </div>


        <?php if($model->commentCount>=1): ?>
            <div class="col-md-12 all-comments-info-area">
               <div class="col-md-1 col-sm-1 col-xs-3  comment-count">
                   <?php echo  $model->commentCount;?>
               </div>
               <div class="col-md-11 col-sm-11 col-xs-9 comment-description">
                   Всего комментариев
               </div>
            </div>
            <?php $this->renderPartial('_comments',array(
                'post'=>$model,
                'comments'=>$model->comments,
            )); ?>
        <?php endif; ?>





            <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
                </div>
            <?php endif; ?>
                <?php $this->renderPartial('/comment/_form',array(
                    'model'=>$comment,
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

        <div class="label-header" style="background: url('/images/label-header2.png'); margin-top: 25px;">
            Последние комментарии
        </div>
        <div class="last-comments-area">
                <?php $this->widget('LastCommentWidget');?>
        </div>

    </div>


<script type="text/javascript">
    $(function(){


        var replyComment = true;
        $('.reply-comment').on('click',function(){
            if(replyComment){
                var parentId = $.trim($(this).attr('data-id'));
                var str = "<form  method='post'>";
                str = str + "<textarea class='form-control' rows='3' name='Comment[text]'></textarea>";
                str = str + "<input type='hidden' name='Comment[parent_id]' value='"+ parentId +"' />";
                str = str + "<input type='submit' class='enter-button-comment pull-right' value='Отправить комментарий' /> </form>";
                $(this).next().html(str);
            } else {
                $(this).next().html('');
            }
            replyComment = !replyComment;
        });

        $(".addrating").on('click',function(){
            var postId = $(this).parent().attr('data-id');
            var type = 1;
            sendAjaxRequest(postId,type);
        });

        $(".addrating-comment").on('click',function(){
            var commentId = $(this).parent().attr('data-id');
            var type = 1;

            sendAjaxRequestComment(commentId,type);
        });

        $(".subrating").on('click',function(){
            var postId = $(this).parent().attr('data-id');
            var type = 2;

            sendAjaxRequest(postId,type);
        });

        $(".subrating-comment").on('click',function(){

            var commentId = $(this).parent().attr('data-id');
            var type = 2;
           sendAjaxRequestComment(commentId,type);
        });


        function sendAjaxRequest(postId,type){
            $.ajax({
                type:"POST",
                url:"/guest/post/changeRating",
                data:'post_id='+ postId + '&type='+ type,
                success:function(data){
                    $('.totalrating').html(data);
                }
            });

        }

        function sendAjaxRequestComment(commentId,type){
            $.ajax({
                type:"POST",
                url:"/guest/comment/changeRating",
                data:'comment_id='+ commentId + '&type='+ type,
                success:function(data){
                    var currentTotalRating = '.totalrating-comment_' + commentId;
                    $(currentTotalRating).html(data);
                }
            });

        }

    });
</script>

</div>


