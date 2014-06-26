<div class="row">
    <div class="col-md-12 borndate">
        <div class="ribbon" style="position: relative;">
            <span id="left-borndate-arrow" class="arrow-borndate"></span>
              <p style="text-align: center;text-transform: uppercase;">Дни рождения</p>
            <span id="right-borndate-arrow" class="arrow-borndate"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="span-md-12 borndate_area">
        <?php $item = 0;?>
        <?php foreach($bornDateMans as $bman):?>
            <?php $item++;?>
            <div class="col-md-6 col-sm-6 <?php if($item==1):?> first-born <?php else:?> two-born <?php endif;?>">
                <div class="born_item">
                  <span class="born-info-span">
                   <h4> <?php echo $bman['fio'];?></h4>
                     <p>
                      <?php
                      $currenDateInfo = getdate();
                      $currenYear = $currenDateInfo['year'];
                      if($bman['born']>366)
                          $currenYear +=1;

                      $timestamp = CDateTimeParser::parse($bman['born_date'],'yyyy-MM-dd HH:mm:ss');
                      $formater = new CDateFormatter('ru_RU');
                      echo $formater->format("d.MM.", $timestamp).$currenYear;
                      ?>
                     исполнится <?php echo $currenYear - $formater->format("yyyy",$timestamp);?>
                     </p>
                  </span>
                    <?php $model = $bman['type_model']::model()->findByPk($bman['id']);?>
                    <?php if($model->img != ''):?>
                       <?php echo CHtml::image($model->findIMGByResolution("107x136", 'height'),'',array('class'=>'pull-right img-responsive'));?>
                    <?php else:?>
                        <?php echo CHtml::image('/images/no-avatar.png','',array('class'=>'pull-right img-responsive','style'=>'width:107px;height:136px;'));?>
                    <?php endif;?>
                    <?php unset($model);?>
                </div>

            </div>
        <?php endforeach;?>
        <a href="<?php echo Yii::app()->createUrl('/team/players/allBorn/') ?>" class="pull-right all-news" style="width:130px;">
            Все дни рождения
        </a>
    </div>
</div>

<script type="text/javascript">
    $(function(){
//
//       $(".borndate_area .born_item").each(function(item){
//           if(item>1)
//               $(this).parent().hide();
//           else
//               $(this).addClass("active_born_item");
//
//
//       });
//
//       $("#left-borndate-arrow").click(function(){
//           var born = $(".born_item:first p").text();
//           $(".active_born_item:last").hide();
//          // getBornData(born,1);
//
//       });
//
//       $("#right-borndate-arrow").click(function(){
//           var born = $(".born_item:last p").text();
//          // getBornData(born,2);
//       });
//
//       function getBornData(born_date,type){
//
//           $.ajax({
//               url: '/team/players/getBornDate',
//               type: 'POST',
//               data:'borndate=' + born_date + '& type=' + type,
//              // dataType:'json',
//               success:function(data){
//
//                   $(".borndate_area").html(data).show(1000);
//               }
//           });
//
//
//       }
    });
</script>

