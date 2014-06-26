<div class="widget_table ">
    <span class="widget-table-label">
        Зона Юг</span>

    <table class="table table-tournament"">
        <thead>
        <tr>
            <th class="col-md-2"></th>
            <th class="col-md-6"></th>
            <th class="col-md-2"></th>
            <th class="col-md-2"></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($tournaments as $t):?>
            <tr <?php if($t->teams->main == 1):?> style="background-color: #ffff4c;" <?php endif;?>>
                <td class="text-right" style="padding-right: 5px;"><?php echo $t->place;?></td>
                <td style="padding-left: 5px;"><?php echo $t->teams->name;?></td>
                <td><?php echo $t->total_matches;?></td>
                <td><?php echo $t->points;?></td>
            </tr>

        <?php endforeach;?>

        </tbody>
    </table>
</div>
<div class="options-details">
    <a href="/season/tournament/">
         Полная <br />
    <img style=""src="<?php echo Yii::app()->baseUrl;?>/images/arrow-bottom.png" />

    </a>
</div>

