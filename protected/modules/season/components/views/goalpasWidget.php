<div class="row" style="margin-top: 29px;">
   <div class="col-md-12">
       <h3 class="ribbon" style="text-transform: uppercase; text-align: center;">Гол+пас</h3>
      <div class="goal_pas">
           <table class="table table-goal-pas">
            <thead>
            <tr>
                <th style="width: 5%;" class="text-center"></th>
                <th style="width: 50%;" class="text-center"></th>
                <th style="width: 15%;" class="text-center">Гол</th>
                <th style="width: 15%;" class="text-center">Пас</th>
                <th style="width: 15%;" class="end-th text-center">Баллы</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($goalpas as $gp):?>
               <tr>
                   <td class="text-center" style="vertical-align: middle"><?php echo $gp->place;?></td>
                   <td class="text-left" style="padding-left: 10px;height: 22px; vertical-align: middle"><?php echo $gp->player_name;?></td>
                   <td class="text-center" style="vertical-align: middle"><?php echo $gp->goal;?></td>
                   <td class="text-center" style="vertical-align: middle"><?php echo $gp->pas;?></td>
                   <td class="end-td text-center" style="vertical-align: middle"><?php echo $gp->total;?></td>
                </tr>

            <?php endforeach;?>
            </tbody>
        </table>
      </div>
   </div>
</div>