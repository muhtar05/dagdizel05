
<h1>Онлайн трансляция матча</h1>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">

                    <div id="data">
                        <?php foreach ($dataProvider->getData() as $online_comment):?>
                            <div class="col-md-9 col-sm-9 online-comment-item">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 type-comment">
                                        <?php echo CHtml::encode($online_comment->type_comment); ?>
                                    </div>

                                    <div class="col-md-2 col-sm-2 minute-comment">
                                        <?php echo CHtml::encode($online_comment->minute); ?>
                                    </div>

                                    <div class="col-md-8 col-sm-8 text-comment">
                                        <?php echo CHtml::encode($online_comment->text); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="clearfix"></div>
                    <?php $this->renderPartial('/onlineMatchComment/_form', array('model'=>new OnlineMatchComment)); ?>
                </div>





                <div class="col-md-3">
                    <?php  echo Teams::model()->findByPk($match->team_home)->name;?> <br />
                    <b>Состав команды</b> <br />
                    <div id="playersHomeList">
                        <?php foreach($playersHome as $playerHome):?>
                            <?php echo $playerHome->name;?>
                            <span class="glyphicon glyphicon-edit"></span>
                            <span class="glyphicon glyphicon-remove"></span>

                            <br />
                        <?php endforeach;?>
                    </div>

                    <a href="#" id="addPlayerHome">Добавить</a>

                    <div id="playerHomeArea">
                        <form>
                            <input type="text" name="OnlineMatchPlayers[name]" id="OnlineMatchPlayers_name" /> <br />
                            <input type="hidden" value="1" name="OnlineMatchPlayers[team_id]" id="OnlineMatchPlayers_team_id" />
                            <input type="hidden" value="<?php echo $_GET['id'];?>" name="OnlineMatchPlayers[onlineMatch_id]"  />
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
                            <?php echo $playerGuest->name;?>
                            <?php echo $playerGuest->goal;?>
                            <?php echo $playerGuest->yelow_card;?>
                            <?php echo $playerGuest->red_card;?>
                            <?php echo $playerGuest->change;?>


                        <?php endforeach;?>
                    </div>

                    <a href="#" id="addPlayerGuest">Добавить</a>

                    <div id="playerGuestArea">
                        <form>
                            <input type="text" name="OnlineMatchPlayers[name]" id="OnlineMatchPlayers_name" /> <br />
                            <input type="hidden" value="2" name="OnlineMatchPlayers[team_id]" id="OnlineMatchPlayers_team_id" />
                            <input type="hidden" value="<?php echo $_GET['id'];?>" name="OnlineMatchPlayers[onlineMatch_id]"  />
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




<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    'options'=>array(
        'title'=>'Добавить игрока',
        'autoOpen'=>false,
    ),
));

$this->renderPartial('/onlineMatchPlayers/_form', array('model'=>new OnlineMatchPlayers));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<script type="text/javascript">
    $(function(){
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


    });
</script>


