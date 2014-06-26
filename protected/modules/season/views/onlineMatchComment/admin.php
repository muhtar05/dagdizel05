
<h1>Онлайн трансляция матча</h1>

<div class="col-md-12">
  <div class="row">
      <div class="col-md-12">
          <div style="margin:0 auto;">
              <?php $form = $this->beginWidget('CActiveForm',array(
                      'id'=>'match-info',
                      'action'=>'/season/match/update/id/'.$match->id,
              ))
              ?>

               <?php echo $form->dropDownList($match,'status',Lookup::items('StatusMatch'));?>

               <?php $resultInfo = explode(':',$match->result);?>
               <?php echo CHtml::textField('Match[result_1]',$resultInfo[0],array('size'=>2));?> :
               <?php echo CHtml::textField('Match[result_2]',$resultInfo[1],array('size'=>2));?>

               <?php echo CHtml::hiddenField('returnUrl','onlineAdmin');?>

               <?php echo CHtml::submitButton($match->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-info')); ?>

              <?php $this->endWidget();?>

              <div class="players-take-gol hidden-xs" style="padding-left: 10px;"></div>
              <div class="commands-and-result">
                  <img src="<?php echo $teamHomeInfo->findIMGByResolution('64x62', 'width'); ?>" class="first-players" />
                  <?php $resultInfo = explode(":",$match->result);?>
                  <span class="badge"><?php echo $resultInfo[0];?><span class="line">&nbsp;</span></span>
                  <span class="badge-delimiter">&nbsp;</span>
                  <span class="badge"><?php echo $resultInfo[1];?><span class="line">&nbsp;</span></span>
                  <img src="<?php echo $teamGuestInfo->findIMGByResolution('64x62', 'width'); ?>" class="second-players" />
                  <p class="text-center date-play"><?php echo $match->date;?></p>
              </div>
          </div>
         <div class="row">
             <div class="col-md-9">

             <div id="data">
                     <?php foreach ($dataProvider->getData() as $online_comment):?>
                      <div class="col-md-12 col-sm-12 online-comment-item <?php echo $online_comment->getColorType();?>">
                       <div class="row">


                           <div class="col-md-1 col-sm-1 type-comment">
                               <?php if($online_comment->type_comment>1):?>

                                   <?php echo $online_comment->getCommentType();?>
                               <?php else:?>
                               <?php endif;?>
                           </div>


                           <div class="col-md-1 col-sm-1 minute-comment">
                               <?php echo CHtml::encode($online_comment->minute); ?>
                           </div>

                           <div class="col-md-8 col-sm-8 text-comment">
                               <?php echo CHtml::encode($online_comment->text); ?>
                           </div>

                           <div class="col-md-2 col-sm-2 text-comment">
                               <span data-id='<?php echo $online_comment->id; ?>' class="glyphicon glyphicon-edit"></span>
                               <span data-id='<?php echo $online_comment->id; ?>' class="glyphicon glyphicon-remove"></span>
                           </div>

                       </div>
                   </div>
                 <?php endforeach;?>


             </div>

                 <div class="clearfix"></div>
                 <input type="button" class="btn btn-info" style="margin-top:20px;" value="Добавить комментарий" id="addCommentButton" />
                 <div class="addComment" title="Добавление нового комментария"style="display:none;z-index: 999999;">
                     <h3>Добавить</h3>
                     <?php $this->renderPartial('_form', array('model'=>new OnlineMatchComment)); ?>
                 </div>

<!--                 --><?php //$this->renderPartial('_form', array('model'=>new OnlineMatchComment)); ?>
         </div>






             <div class="col-md-3">
                 <?php  echo Teams::model()->findByPk($match->team_home)->name;?> <br />
                <b>Состав команды</b> <br />
                 <div id="playersHomeList">
                    <?php foreach($playersHome as $playerHome):?>
                        <div>
                           <?php echo $playerHome->number.'  '.$playerHome->name;?>
                           <?php foreach($playerHome->events as $event):?>
                                 <?php echo $event->type_event;?>
                           <?php endforeach;?>
                           <span data-id="<?php echo $playerHome->id;?>" class="glyphicon glyphicon-remove"></span>

                        </div>
                     <?php endforeach;?>
                 </div>

                 <a href="#" id="addPlayerHome">Добавить</a>

                 <div id="playerHomeArea">
                     <form>
                         <label>Название</label><br />
                            <input type="text" name="OnlineMatchPlayers[name]"  /> <br />
                         <label>Номер</label><br />
                            <input type="text" size="5" name="OnlineMatchPlayers[number]"  /> <br />

                        <input type="hidden" value="1" name="OnlineMatchPlayers[team_id]" id="OnlineMatchPlayers_team_id" />
                        <input type="hidden" value="<?php echo $_GET['id'];?>" name="OnlineMatchPlayers[match_id]" id="OnlineMatchPlayers_match_id" />
                        <?php echo CHtml::ajaxButton ("Добавить",
                         CController::createUrl('/season/onlineMatchPlayers/createPlayer'),
                         array(
                             'type'=>'POST',
                             'data'=>'js:jQuery(this).parents("form").serialize()',
                             'update' => '#playersHomeList',

                         ),
                         array(
                             'class'=>'btn btn-success btn-xs',
                         )

                     );
                     ?>

                     <input type="button" value="Отмена" class="cancel" class="btn btn-danger btn-xs">
                   </form>
                 </div>


                <br /> <br />

                <?php  echo Teams::model()->findByPk($match->team_guest)->name;?> <br />
                <b>Состав команды</b> <br />
                 <div id="playersGuestList">
                    <?php foreach($playersGuest as $playerGuest):?>
                        <div>
                            <?php echo $playerGuest->number.'  '.$playerGuest->name;?>
                            <span data-id="<?php echo $playerGuest->id;?>" class="glyphicon glyphicon-remove"></span>
                        </div>

                    <?php endforeach;?>
                 </div>

                 <a href="#" id="addPlayerGuest">Добавить</a>

                 <div id="playerGuestArea">
                     <form>
                         <label>Название</label><br />
                         <input type="text" name="OnlineMatchPlayers[name]"  /> <br />
                         <label>Номер</label><br />
                         <input type="text" size="5" name="OnlineMatchPlayers[number]"  /> <br />

                         <input type="hidden" value="2" name="OnlineMatchPlayers[team_id]" id="OnlineMatchPlayers_team_id" />
                         <input type="hidden" value="<?php echo $_GET['id'];?>" name="OnlineMatchPlayers[match_id]" id="OnlineMatchPlayers_match_id" />
                         <?php echo CHtml::ajaxButton ("Добавить",
                             CController::createUrl('/season/onlineMatchPlayers/createPlayer'),
                             array(
                                 'type'=>'POST',
                                 'data'=>'js:jQuery(this).parents("form").serialize()',
                                 'update' => '#playersGuestList',

                             ),
                             array(
                                 'class'=>'btn btn-success btn-xs',
                             )

                         );
                         ?>

                         <input type="button" value="Отмена" class="cancel" class="btn btn-danger btn-xs">
                     </form>
                 </div>

        </div>
         </div>

       </div>
  </div>
</div>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
   $(function(){

       var typeComments = <?php echo CJSON::encode(Lookup::items('OnlineCommentType'));?>;

       $("#playerHomeArea").hide();
       $("#addPlayerHome").on('click',function(){
             $("#playerHomeArea").show();
             return false;
       });

       $("#playerGuestArea").hide();
       $("#addPlayerGuest").on('click',function(){
             $("#playerGuestArea").show();
             return false;
       });

       $(".cancel").on('click',function(){
              $(this).parent().parent().hide();

       });


       $("#data").on('click','.glyphicon-remove',function(){
              var idComment = $(this).attr('data-id');
              deleteComment(idComment);
              $(this).parent().parent().remove();

       });


       $("#data").on('click','.glyphicon-edit',function(){
              var parentElement = $(this).parent().parent();
              var idComment = $(this).attr('data-id');
              var commentMinute = parentElement.children('.minute-comment').text();
              var commentText = parentElement.children('.text-comment').text();
              var commentType = $.trim(parentElement.children('.type-comment').text());

              var selectType = "<select name='type-comment'>";

              $.each(typeComments,function(i){
                  if(commentType == i)
                      selectType = selectType + "<option selected='selected' value='" + i + "'>" + typeComments[i] + "</option>";
                  else
                    selectType = selectType + "<option value='" + i + "'>" + typeComments[i] + "</option>";
              });

              selectType = selectType + "</select>";

              var str = "<form><div class='col-md-2'>"+ selectType +"</div>";
              str = str + "<div class='col-md-2'><input size='5' type='text' name='minute-comment' value='" + $.trim(commentMinute) + "' /><input type='hidden' name='id-comment' value='" + $.trim(idComment) +"' /> </div>";
              str =str +  "<div class='col-md-6'><textarea name='text-comment' cols='50'>"+ $.trim(commentText) +"</textarea></div>";
              str = str + "<div class='col-md-2'><input type='button' class='edit-comment btn btn-info' value='Сохранить' /></form>";
              parentElement.html(str);
       });

       $("#addCommentButton").on('click',function(){
            $(".addComment").dialog({
                modal:true,
                width:700,
                height:400,
                position:"center"
            });
       });


       // Удаление домашних игроков
       $("#playersHomeList").on('click', '.glyphicon-remove',function(){
             var id = $.trim($(this).attr("data-id"));
             deletePlayer(id);
             $(this).parent().remove();

       });

       // Удаление гостевых игроков
       $("#playersGuestList").on('click','.glyphicon-remove',function(){
           var id = $(this).attr("data-id");
           deletePlayer(id);
           $(this).parent().remove();
       });

//       // Обработчик для реддактировнаия комментария
//       $(".online-comment-item").on('click','.edit-comment',function(){
//           var parentElement = $(this).parent().parent();
//           $.ajax({
//                  type:"POST",
//                  url:"/season/onlineMatchComment/updateComment",
//                  data:$(this).parents('form').serialize(),
//                  success:function(data){
//                       parentElement.html(data);
//                       alert("Success");
//                  }
//           });
//       });


       $('#player-button-add-event').on('click',function(){
           $.ajax({
               type: "POST",
               url: "/season/onlineMatchPlayers/addEvent",
               data:$(this).parents('form').serialize(),
               success:function(data){
                   $("#dialog").dialog("close");
               }
           });
       });



      // удаление игрока
      function deletePlayer(id){
               $.ajax({
                    data:'id='+ id,
                    url:"/season/onlineMatchPlayers/deletePlayer",
                    error:function(data){
                        alert(data)
                    }
               });
       }

      // Удаление комментария
       function deleteComment(id){
           $.ajax({
               data:'id='+ id,
               url: "/season/onlineMatchComment/deleteComment",
               error:function(data){
                   alert(data);
               }

           });
       }


       $("#OnlineMatchComment_type_comment").on('change',function(){
           $(".players-select").hide();
          var currentValue = $(this).attr('value');
          var eventArr = [2,4,5];
          if (in_array(currentValue,eventArr)){
               $(".players-select").show();
          }

       });



       function in_array(needle, haystack, strict) {
           var found = false, key,strict = !!strict;

           for (key in haystack){
               if ((strict && haystack[key] === needle) || (!strict && haystack[key] == needle)) {
                     found = true;
                     break;
               }
           }

           return found;
       }
   });
</script>
