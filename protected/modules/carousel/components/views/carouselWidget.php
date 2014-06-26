<div id="carousel-example-captions" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#carousel-example-captions" data-slide-to="0" class=""></li>
        <li data-target="#carousel-example-captions" data-slide-to="1" class="active"></li>

    </ol>

    <div class="carousel-inner">
        <?php $item  = 0;?>
        <?php foreach($carouselItems as $carousel):?>
           <?php $item++;?>
           <div class="item <?php if($item == 1):?> active <?php endif;?>">
               <?php echo CHtml::image($carousel->findIMGByResolution("449x297", 'width'));?>
               <div class="carousel-caption">
                  <h3><?php echo $carousel->title;?></h3>
                  <p><?php echo $carousel->description;?></p>
               </div>
            </div>
        <?php endforeach;?>
    </div>

    <a class="left carousel-control" href="#carousel-example-captions" data-slide="prev">
        <span class="glyphicon left-arrow "></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-captions" data-slide="next">
        <span class="glyphicon right-arrow"></span>
    </a>
</div>