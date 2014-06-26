<style>
    .media {
        max-height: 105px;
        overflow: hidden;
    }
</style>
 <?php foreach($news as $nw):?>
        <?php
                $timestamp = CDateTimeParser::parse($nw->date,'yyyy-MM-dd HH:mm:ss');
                $formater = new CDateFormatter('ru_RU');
        ?>

            <?php if($nw->img != ''):?>
         <div class="media col-xs-12 col-sm-12">
                <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs">
                    <span class="news-date"><?php echo $formater->format("d.MM.yyyy", $timestamp); ?></span>
                    <?php echo CHtml::image($nw->findIMGByResolution("103x69", 'width'),'',array('class'=>' media-object',"height"=>65,"width"=>103));?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <?php echo CHtml::link($nw->title,array('/news/show/'.$nw->id."_".CString::translitTo($nw->title)), array('class' => 'media-link'));?>
                    <p><?php echo CString::truncateText($nw->shorttext,150); ?></p>

                </div>
               </div>
            <?php else:?>
             <div class="media col-xs-12 col-sm-12" style="height: 105px;">
                <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs">
                    <span class="news-date"><?php echo $formater->format("d.MM.yyyy", $timestamp); ?></span>
                </div>
                <div class="col-md-9 col-sm-8">
                    <?php echo CHtml::link($nw->title,array('/news/show/'.$nw->id."_".CString::translitTo($nw->title)), array('class' => 'media-link'));?>

                </div>
                </div>

                <p><?php echo CString::truncateText($nw->shorttext,150); ?></p>

            <?php endif;?>


        </div>
    <?php endforeach;?>

<a href="<?php echo Yii::app()->createUrl('/news') ?>" class="pull-right all-news" >
    Все новости
</a>


