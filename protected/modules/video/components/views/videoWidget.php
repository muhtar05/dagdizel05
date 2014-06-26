
<div class="row">
<?php foreach($videos as $video):?>
    <div class=" multimedia-item col-xs-6">
        <div class="multimedia-thumb video-list-widget" style="position: relative;">
           <a href="/video/show/id/<?php echo $video->id;?>">
               <img  src="" alt="<?php echo $video->content; ?>" class="img-responsive" />
               <i class="icon-play"></i>
            </a>
        </div>
        <div class="multimedia-details">
            <?php
            $form = new CDateFormatter('ru_RU');
            ?>
            <span class="title"><?php echo $video->name; ?></span>
            <span class="date"><?php echo $form->format('d MMMM yyyy',$video->date); ?></span>
        </div>
    </div>
<!--</div>-->
<?php endforeach;?>


</div>

<a href="<?php echo Yii::app()->createUrl('/video') ?>" class="pull-right all-news" style="margin-right: 0px;" >
    Все видео
</a>
