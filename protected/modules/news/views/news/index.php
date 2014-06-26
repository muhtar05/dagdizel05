


<?php

$this->pageTitle = 'Новости | '.$this->pageTitle;

$this->breadcrumbs=array(
	'Новости',
);

?>


<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12 ">
        <h1>Новости</h1>
    <?php $this->widget('zii.widgets.CListView', array(
	   'dataProvider'=>$dataProvider,
	   'itemView'=>'_view',
       'itemsTagName'=>'ul',
       'summaryText'=>'',
       'cssFile'=>false,
       'template'=>'{items}<div class="clearfix"></div><div class="col-md-12 col-sm-12 col-xs-12">{pager}</div>',
        'pager'=>array(
            'cssFile'=>false,
            'header'=>'',
            'prevPageLabel' => '',
            'nextPageLabel' => '',

        ),
    )); ?>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <br />
        <span class="title">Топ новости</span>
        <br />
        <?php
        foreach ($topNews as $top) :
        ?>
        <div class="top-news">
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