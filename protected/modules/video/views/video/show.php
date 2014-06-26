<?php
$urlArr = parse_url($model->content);
$temp = explode("&",$urlArr['query']);
for($i = 0; $i < count($temp); $i++) {
    $tempVar = explode('=',$temp[0]);
    if ($tempVar[0] == 'v') {
        $video_id = $tempVar[1];
    }
}
?>

<h1><?php echo $model->name; ?></h1>
<div class="video-container">
<iframe src="http://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0"  width="560" height="315" ></iframe>
</div>
<br /><br />
<p>
    <?php echo $model->description; ?>
</p>

<h4>Последние видео</h4>
<?php foreach($lastVideos as $video):?>

<a href="<?php echo Yii::app()->createUrl('video/show', array('id' => $video->id)); ?>">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="multimedia-item">
           <div class="multimedia-thumb video-list-widget" style="position: relative;">

            <img  src="" alt="<?php echo $video->content; ?>" class="img-responsive" />
            <i class="icon-play"></i>

        </div>
        <div class="multimedia-details">
            <?php
            $form = new CDateFormatter('ru_RU');
            ?>
            <span class="title"><?php echo $video->name; ?></span>
        </div>
    </div>
  </div>
</a>
<?php endforeach;?>