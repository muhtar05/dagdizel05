
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view'
));
?>

<?php $this->renderPartial('create',array('model'=>new OnlineMatch()),false,true);?>
