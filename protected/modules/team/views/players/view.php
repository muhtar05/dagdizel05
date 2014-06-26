<?php
$this->breadcrumbs=array(
	'Игроки'=>array('index'),
	$model->fio,
);
?>
<div class="custom-content">
    <h1 class="defaulth1"><?php echo $model->fio;?></h1>

<div class="col-md-12 col-sm-12 col-xs-12 player-info-area">
    <div class="row">
        <div class="col-md-5 col-sm-5">
           <div class="player-info">
               <div class="player-photo">

                   <?php if($model->img !=''):?>
                       <?php echo CHtml::image($model->findIMGByResolution("256x254", 'width'),'',array('class'=>'pimg img-responsive'));?>
                        <?php else:?>
                       <?php echo CHtml::image('/images/no-avatar.png','',array('class'=>'img-responsive pimg'));?>
                   <?php endif;?>
               </div>

<!--                <img src="/images/player-info.png" class="img-responsive"/>-->

                <div class="player-info-details">
                   <table>
                       <tr>
                           <td>Амплуа</td>
                           <td><?php echo $model::getAmpluaName($model->amplua_id);?></td>
                       </tr>

                       <tr>
                           <td>Страна</td>
                           <td>Россия</td>
                       </tr>
                       <tr>
                           <td>Дата рождения</td>
                           <td>
                               <?php
                               $timestamp = CDateTimeParser::parse($model->born_date,'yyyy-MM-dd HH:mm:ss');
                               $formater = new CDateFormatter('ru_RU');
                               echo $formater->format("d MMMM yyyy г.", $timestamp);
                               ?>
                           </td>
                       </tr>
                      <?php if($model->height !== ''):?>
                       <tr>
                           <td>Рост</td>
                           <td><?php echo $model->height;?> см</td>
                       </tr>
                      <?php endif;?>
                       <tr>
                           <td>Вес</td>
                           <td><?php echo $model->weight;?> кг</td>
                       </tr>

                   </table>
               </div>


           </div>


        </div>

        <div class="col-md-7 col-sm-7 biography">
              <a href="/team/players/"><div class="player-info-arrow"></div></a>
               <h4><?php echo $model->fio;?></h4>
               <p>
                   <?php echo $model->info;?>
               </p>
        </div>
    </div>
  </div>
</div>