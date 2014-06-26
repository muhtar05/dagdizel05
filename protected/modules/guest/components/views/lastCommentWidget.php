
<?php foreach($lastComment as $lcomment):?>
  <div class="last-comments">

      <span class="comment-author">

          <?php if($lcomment->user_id>0):?>
              <?php  echo $lcomment->author->username;?>
          <?php else:?>
              Гость
          <?php endif;?>
      </span>&rarr; <?php echo CHtml::encode(CString::truncateText($lcomment->text,100));?>
      <br /><?php echo CHtml::link('Далее',array('post/view/id/'.$lcomment->post_id))?>
  </div>
<?php endforeach;?>