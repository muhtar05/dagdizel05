
<h1><?php echo $model->title;?></h1>

<?php echo CHtml::encode($model->text);?>


<?php if($model->commentCount>=1): ?>
    <h3>
        <?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
    </h3>

    <?php $this->renderPartial('_comments',array(
        'post'=>$model,
        'comments'=>$model->comments,
    )); ?>
<?php endif; ?>

<?php if(Yii::app()->user->isUser()):?>

    <h3>Оставить комментарий</h3>

    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/comment/_form',array(
            'model'=>$comment,
        )); ?>
    <?php endif; ?>
<?php else: ?>
    <p>Вам необходимо войти на сайт, чтобы оставить комментарий</p>
<?php endif;?>



<div class="post-item">
    <h3><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></h3>
    <div class="col-md-12 col-sm-12 published-author">
        <div class="row">
            <div class="col-md-6 col-sm-12">
              <span class="date-post">
                  <?php
                  $timestamp = CDateTimeParser::parse($data->date,'yyyy-MM-dd HH:mm:ss');
                  $formater = new CDateFormatter('ru_RU');
                  echo $formater->format("d MMM yyyyг", $timestamp);
                  ?>
              </span>
                Опубликовал:<?php echo $data->author->username;?>
            </div>
            <div class="col-sm-12 col-md-6">
               <span class="post-rating" data-id="<?php echo $data->id;?>">
                 <span class="addrating"></span>
                 <span class="totalrating"><?php echo $data->countPostRating();?></span>
                 <span class="subrating"></span>
               </span>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
    <?php echo $data->text; ?>


    <div class="all-comments-info">
        Комментариев:<?php echo $data->commentCount;?>/ Просмотров:<?php echo $data->browsing;?>
    </div>

</div>