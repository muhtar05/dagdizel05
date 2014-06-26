<?php if (count($data->gallery) > 0) : ?>
<a href="<?php echo Yii::app()->createUrl('/gallery/gallery/view', array('id' => $data->id)); ?>">
<div class=" col-sm-6 col-xs-4 multimedia-item">
    <div class="multimedia-thumb">

            <?php if(!empty($data->main_photo)):?>

                <?php $galleryPhoto = GalleryPhoto::model()->find(array('condition'=>"t.img='".$data->main_photo."'"));?>
                <img src="<?php echo $galleryPhoto->findIMGByResolution('300x300', 'width'); ?>" class="img-responsive" />
            <?php else:?>
                <img src="<?php echo $data->gallery[0]->findIMGByResolution('300x300', 'width'); ?>" class="img-responsive"/>
            <?php endif;?>

            <div class="overlay"><?php echo $data->countPhoto;?></div>
            <i class="icon-camera"></i>

    </div>
    <div class="multimedia-details">
        <?php
        $form = new CDateFormatter('ru_RU');
        ?>
        <span class="title"><?php echo $data->name; ?></span>
                    <span class="date"><?php echo $form->format('d MMMM yyyy', $data->create_time); ?>
                    </span>
    </div>
</div>
</a>
<?php endif; ?>

