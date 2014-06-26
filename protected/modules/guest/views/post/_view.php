<div class="post-item">
    <?php if(Yii::app()->user->id === $data->user_id):?>
        <h3><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
            <a href="/guest/post/update/id/<?php echo $data->id;?>"><span class="glyphicon glyphicon-edit"></span></a></h3>
   <?php else: ?>
        <h3><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>
            </h3>
    <?php endif;?>


    <div class="col-md-12 col-sm-12 col-xs-12 published-author">
        <div class="row">

              <div class="date-post col-md-4 col-sm-4 col-xs-3">
                  <?php
                  $timestamp = CDateTimeParser::parse($data->date,'yyyy-MM-dd HH:mm:ss');
                  $formater = new CDateFormatter('ru_RU');
                  echo $formater->format("d MMM yyyyг", $timestamp);
                  ?>
              </div>

             <div class="col-md-6 col-sm-6 col-xs-3 hidden-xs author-name-pub"> Опубликовал:
                 <span class="author-name"><?php echo $data->author->username;?></span>
             </div>



               <span class="post-rating" data-id="<?php echo $data->id;?>">
                 <span class="addrating"></span>
                 <span class="totalrating"><?php echo $data->countPostRating();?></span>
                 <span class="subrating"></span>
               </span>

          </div>

    </div>
    <div class="clearfix"></div>

    <?php echo $data->text;?>


    <div class="all-comments-info">
        Комментариев:<?php echo $data->commentCount;?>/ Просмотров:<?php echo $data->browsing;?>
    </div>

</div>