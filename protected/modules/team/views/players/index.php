<?php
$this->breadcrumbs=array(
	'Игроки',
);
?>

<h1>Игроки</h1>

   <ul class="nav  players-amplua nav-pills">
       <li class="filter active" data-filter="goalkeeper defender halfback forward"><span>Все</span></li>
       <li class="filter" data-filter="goalkeeper"><span>Вратари</span></li>
       <li class="filter" data-filter="defender"><span>Защитники</span></li>
       <li class="filter" data-filter="halfback"><span>Полузащитники</span></li>
       <li class="filter" data-filter="forward"><span>Нападающие</span></li>
   </ul>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'itemsTagName'=>'ul',
    'itemsCssClass'=>'players',
    'summaryText'=>'',
)); ?>


<script type="text/javascript" src="/js/jquery.mixitup.js"></script>
<script type="text/javascript" src="http://responsivewebinc.com/premium/lenord/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="http://responsivewebinc.com/premium/lenord/js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('.players').mixitup({ });
    });
</script>




