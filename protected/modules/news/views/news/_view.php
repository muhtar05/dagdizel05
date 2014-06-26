<!--<li class="media">-->
<!--    <a class="img-link col-xs-12 col-sm-3 hidden-xs" href="--><?php //echo Yii::app()->createUrl('/news/show/'.$data->id."_".CString::translitTo($data->title));?><!--">-->
<!--        --><?php
//        $timestamp = CDateTimeParser::parse($data->date,'yyyy-MM-dd HH:mm:ss');
//        $formater = new CDateFormatter('ru_RU');
//        ?>
<!--        <span class="news-date">--><?php //echo $formater->format("d MMM yyyy", $timestamp); ?><!--</span>-->
<!--        --><?php
//            if ($data->img != '') :
//        ?>
<!--        <img src="--><?php //echo $data->findIMGByResolution('100x65', 'width'); ?><!--" alt="" class="img-responsive media-object">-->
<!--        --><?php
//            endif;
//        ?>
<!--    </a>-->
<!--    <div class="media-body">-->
<!--        --><?php //echo CHtml::link($data->title,array('/news/show/'.$data->id."_".CString::translitTo($data->title)), array('class' => 'media-link'));?>
<!--        <p>--><?php //echo CString::truncateText($data->shorttext,200); ?><!--</p>-->
<!--    </div>-->
<!--</li>-->

<li class="media">
    <?php
    $timestamp = CDateTimeParser::parse($data->date,'yyyy-MM-dd HH:mm:ss');
    $formater = new CDateFormatter('ru_RU');
    ?>
    <?php if($data->img != ''):?>
        <div class="row">
            <div class="col-md-3 col-sm-4 hidden-xs">
                <span class="news-date"><?php echo $formater->format("d.MM.yyyy", $timestamp); ?></span>
                <?php echo CHtml::image($data->findIMGByResolution("103x69", 'width'),'',array('class'=>' media-object',"height"=>69,"width"=>103));?>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <?php echo CHtml::link($data->title,array('/news/show/'.$data->id."_".CString::translitTo($data->title)), array('class' => 'media-link'));?>
                <p><?php echo CString::truncateText($data->shorttext,100); ?></p>

            </div>
        </div>
    <?php else:?>
    <div class="row">
        <div class="col-md-3 col-sm-4 hidden-xs">
            <span class="news-date"><?php echo $formater->format("d.MM.yyyy", $timestamp); ?></span>
        </div>
        <div class="col-md-9 col-sm-8">
            <?php echo CHtml::link($data->title,array('/news/show/'.$data->id."_".CString::translitTo($data->title)), array('class' => 'media-link'));?>

        </div>
    </div>

    <p><?php echo CString::truncateText($data->shorttext,100); ?></p>
   <?php endif;?>
</li>



