<?php
$this->breadcrumbs = array(
    $model->title
);

$this->pageTitle = $model->title.' - '.Yii::app()->name;
?>

<div class="pages_content">
    <!--        <div class="information-content"> -->
    <?php echo $model->body; ?>
    <!--        </div>-->
</div>
