<a href="<?php echo Yii::app()->createUrl('video/show', array('id' => $data->id)); ?>">
<div class="col-sm-6 col-xs-4 multimedia-item">
    <div class="multimedia-thumb video-list-widget" style="position: relative;">

            <img  src="" alt="<?php echo $data->content; ?>" class="img-responsive" />
            <i class="icon-play"></i>

    </div>
    <div class="multimedia-details">
        <?php
        $form = new CDateFormatter('ru_RU');
        ?>
        <span class="title"><?php echo $data->name; ?></span>
<!--        <span class="date">--><?php //echo $form->format('d MMMM yyyy',$data->date); ?><!--<br/>--><?php //echo $form->format('H:m',$data->date); ?><!--</span>-->
    </div>
</div>
</a>