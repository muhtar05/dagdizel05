<?php foreach($comments as $comment): ?>
    <?php
        $marginLeft = $comment->level * 10;
        $class = ($comment->level>1)? 'answer' : '';
    ?>
    <div class="comment-item col-md-12 <?php echo $class;?>" style="padding-left:<?php echo $marginLeft;?>px;">
        <div class="row">


            <div class="col-md-12">
                <div class="info-comment">
                    <span class="comment-author">
                        <?php if($comment->user_id>0):?>
                             <?php  echo $comment->author->username;?>
                        <?php else:?>
                              Гость
                        <?php endif;?>
                    </span>
                    <span class="type-author"></span>
                    <span class="comment-time"><?php echo $comment->create_date;?></span>
                <span class="post-rating comment-post-rating" data-id="<?php echo $comment->id;?>">
                     <span class="addrating-comment"></span>
                     <span class="totalrating-comment_<?php echo $comment->id;?>"><?php echo $comment->countCommentRating();?></span>
                     <span class="subrating-comment"></span>
                </span>
                </div>

                <div class="comment-text">
                      <?php echo CHtml::encode($comment->text);?>
                </div>
               <span class="reply-comment" data-id="<?php echo $comment->id;?>">Ответить</span>
               <div class="comment-form"></div>
            </div>

        </div>



    </div>
<?php endforeach; ?>