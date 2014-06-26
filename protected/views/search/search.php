<div class="custom-content">
<h1 class="custom1">Результаты поиска по запросу <i style="color:#428bca;"><?php echo CHtml::encode(Yii::app()->getRequest()->getParam('q'));?></i></h1>
<?php
//echo CHtml::beginForm(array('search/search'), 'get', array('style'=> 'inline')) .
//    CHtml::textField('q', '', array('placeholder'=> 'search...','style'=>'width:140px;')) .
//    CHtml::submitButton('Поиск!',array('class'=>'enter-button-comment')) .
//    CHtml::endForm('');
?>

<?php if(!empty($players)):?>
    <h3>Игроки</h3>
    <?php foreach($players as $p):?>
       <?php echo CHtml::link($p->fio,array('/team/players/view','id'=>$p->id));?><br />
    <?php endforeach;?>
<?php endif;?>


<?php if(!empty($personal)):?>
    <h3>Персонал</h3>
    <?php foreach($personal as $pers):?>
        <?php echo CHtml::link($pers->fio,array('/team/personal/view','id'=>$pers->id));?><br />
 <?php endforeach;?>
<?php endif;?>

<?php if(!empty($coaches)):?>
    <h3>Тренеры</h3>
    <?php foreach($coaches as $coach):?>
        <?php echo CHtml::link($coach->fio,array('/team/coaches/view','id'=>$coach->id));?><br />
    <?php endforeach;?>
<?php endif;?>
<?php if(!empty($news)):?>
  <h3>Новости</h3>
  <?php foreach($news as $new):?>
       <?php echo CHtml::link($new->title,array('/news/show/'.$new->id."_".CString::translitTo($new->title)), array('class' => 'media-link'));?> <br />
  <?php endforeach;?>
<?php endif;?>

<?php if(!empty($gallery)):?>
  <h3>Галереи</h3>
  <?php foreach($gallery as $gal):?>
      <h5><?php echo CHtml::link($gal->name,array('/gallery/view/'.$gal->id));?></h5>
  <?php endforeach;?>
<?php endif;?>


<?php if(!empty($video)):?>
<h3>Видео</h3>
<?php foreach($video as $vid):?>
    <h5><?php echo CHtml::link($vid->name,array('video/show','id'=>$vid->id));?></h5>
<?php endforeach;?>
<?php endif;?>
</div>