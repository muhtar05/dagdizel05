<div class="col-md-12 col-sm-12 online-comment-item">
   <div class="row">
        <div class="col-md-2 col-sm-2 type-comment">
           <?php echo CHtml::encode($data->type_comment); ?>
        </div>

        <div class="col-md-2 col-sm-2 minute-comment">
            <?php echo CHtml::encode($data->minute); ?>
        </div>

        <div class="col-md-8 col-sm-8 text-comment">
            <?php echo CHtml::encode($data->text); ?>
        </div>
   </div>
</div>