<div class="row">

    <?php foreach ($gallery as $obj): ?>
        <?php
        $photo = GalleryPhoto::model()->findByAttributes(array('gallery_id' => $obj->id));

        if (!empty($photo)) :
            ?>
            <div class="col-xs-6 multimedia-item ">
                <div class="multimedia-thumb" style="position: relative;">
                    <a href="/gallery/view/<?php echo $obj->id;?>">
                        <img src="<?php echo $photo->findIMGByResolution('300x200', 'width'); ?>" class="img-responsive"/>
                        <div class="overlay"><?php echo $obj->countPhoto;?></div>
                        <i class="icon-camera"></i>
                        <!--                <i class="icon-camera-corner"></i>-->
                    </a>
                </div>
                <div class="multimedia-details">
                    <?php
                    $form = new CDateFormatter('ru_RU');
                    ?>
                    <span class="title"><?php echo $obj->name; ?></span>
                    <span class="date"><?php echo $form->format('d MMMM yyyy', $obj->create_time); ?>
                    </span>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>




</div>

<a href="<?php echo Yii::app()->createUrl('/gallery') ?>" class="pull-right all-news" style="margin-right: 0px;margin-top: 10px;">
    Все фотогалереи
</a>