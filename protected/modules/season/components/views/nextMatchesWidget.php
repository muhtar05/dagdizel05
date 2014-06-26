<div class="ribbon" >Следующие матчи</div>
<?php if(count($nextMatches)>0):?>
<?php $item = 0;?>
<?php foreach($nextMatches as $match):?>
    <?php $item++;?>
<div class="row">
    <div class="col-md-4">
            <?php
            $timestamp = CDateTimeParser::parse($match->date,'yyyy-MM-dd HH:mm:ss');
            $formater = new CDateFormatter('ru_RU');
            ?>
        <div class="row">
            <div class="col-md-12" style="text-align: left;color:#484848;">
              <?php echo $formater->format("d MMMM , HH:mm", $timestamp); ?>  <?php echo $match->place;?>
            </div>
        </div>

    </div>

    <div class="col-md-8">

       <table class="table-responsive table-next-matches" style="width: 100%;">

          <tr>
                  <td class="" style="width: 25%;">
                      <?php echo Teams::model()->findByPk($match['team_home'])->name;?>
                  </td>

                  <td class="" style="width: 20%;">
                      <img  src="<?php echo Teams::model()->findByPk($match['team_home'])->findIMGByResolution('40x38', 'width');?>" width="40" height="38" />
                  </td>

                  <td class="" style="width: 10%;">
                      -:-
                  </td>

                  <td class="" style="width: 25%;">
                      <?php echo Teams::model()->findByPk($match['team_guest'])->name;?>
                  </td>

                  <td class="" style="width: 20%;">
                      <img src="<?php echo Teams::model()->findByPk($match['team_guest'])->findIMGByResolution('40x38', 'width');?>"  width="40" height="38" />
                  </td>


          </tr>

    </table>

</div>
</div>
   <?php if($item == 1):?> <div class="col-md-12" style='margin:10px 0;background: url("/images/border-grey.gif") 0 bottom repeat-x;'></div> <?php endif;?>
<?php endforeach;?>
<?php else:?>
    Нет матчей
<?php endif;?>