
<li class="span3">
    <div class="thumbnail">

        <img src="<?php echo $data->findIMGByResolution('300x200', 'width', '300'); ?>" alt="300x200">
        <div class="caption">
            <h3><?php echo $data->name;?></h3>
                <?php echo CHtml::link('<i class="icon-edit"></i>',array('update','id'=>$data->id),array('class'=>'btn btn-primary'));?>
                <?php echo CHtml::link('<i class="icon-remove"></i>',array('delete','id'=>$data->id),array('class'=>'btn btn-danger'));?>
                <?php echo CHtml::link('Сделать главной',array('setmain','id'=>$data->id),array('class'=>'btn btn-primary'));?>


        </div>
    </div>
</li>