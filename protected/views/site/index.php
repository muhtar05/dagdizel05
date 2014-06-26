<div class="row">
    <div class="col-md-6 col-sm-5">
        <h4>Новости</h4>
    </div>
    <div class="col-md-6 col-sm-7 hidden-xs">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h4>Таблица</h4>
            </div>
            <div class="col-md-6 col-sm-6">
                <h4>Мультимедиа</h4>
            </div>
        </div>

    </div>
</div>
<div class="row">

    <div  class="col-left-padding col-md-6 col-sm-5 col-xs-12 vertical-dashed-line">
        <?php $this->widget('news.components.LastNewsWidget'); ?>
        <?php $this->widget('season.components.GoalpasWidget'); ?>
        <?php $this->widget('poll.components.PollWidget'); ?>

    </div>

    <div class="col-left-padding col-md-6 col-sm-7 col-xs-12 multimedia">


        <div class="row">

            <div class="col-md-6 col-sm-6 vertical-dashed-line" >
                <div class="row">
                    <?php $this->widget('season.components.TournamentWidget'); ?>
                    <h4 style="color: #15212f; font-size: 20px;font-family: Tahoma;margin-left: 18px;">Туры</h4>
                    <?php $this->widget('season.components.CalendarWidget'); ?>
                    <?php $this->widget('team.components.BornDateWidget'); ?>
                </div>

            </div>
            <div class="col-md-6 col-sm-6 ">
                <?php $this->widget('video.components.VideoWidget'); ?>
                <div class="clearfix"></div>
                <?php $this->widget('gallery.components.GalleryWidget'); ?>

            </div>
        </div>
    </div>
</div>