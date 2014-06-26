<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = $model->title.' | Новости | '.$this->pageTitle;
$this->breadcrumbs=array(
    'Новости'=>array('index'),
    $model->title,
);

?>
<style>
    .news-content p {
        text-indent: 20px; /* Отступ первой строки */
    }
</style>

<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <h1 class="defaulth1" style="margin-bottom:0"><?php echo $model->title; ?></h1>
        <?php
        $timestamp = CDateTimeParser::parse($model->date,'yyyy-MM-dd HH:mm:ss');
        $formater = new CDateFormatter('ru_RU');
        ?>
        <span class="news-date"><?php echo $formater->format("d MMM yyyy", $timestamp); ?></span>
        <div class="news-content">

        <?php echo CHtml::image($model->findIMGByResolution("220x220", 'width'), '', array('style' => 'float:left;margin-right:20px;'));?>


                <?php echo $model->text; ?>

        </div>


        <div class="clearfix"></div>
<!--        <div class="row">-->
<!--            <span class="title">Новости</span>-->
<!--            --><?php //$this->widget('zii.widgets.CListView', array(
//                'dataProvider'=>$dataProvider,
//                'itemView'=>'_view',
//                'itemsTagName'=>'ul',
//                'summaryText'=>'',
//            )); ?>
<!--        </div>-->
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <br />
        <span class="title">Топ новости</span>
        <br />
        <?php
        foreach ($topNews as $top) :
            ?>
            <div class="top-news thumbnail">
                <a href="/news/show/<?php echo $top->id."_".CString::translitTo($top->title);?>">
                  <div class="top-news-thumb">
                    <img src="<?php echo $top->findIMGByResolution('360x360', 'width');?>" class="img-responsive" />
                  </div>
                </a>
                <div class="top-news-details" style="position: relative">
                    <p><?php echo $top->title; ?></p>
                    <div style="position: absolute;right: 20px; top: 50px;">
                        <a href="<?php echo Yii::app()->createUrl('/news/show/'.$top->id."_".CString::translitTo($top->title));?>">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>