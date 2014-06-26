<?php


class  LastCommentWidget extends CWidget
{
    public function run()
    {
        $lastComment = Comment::model()->findAll(array(
                              'condition'=>'status='.Comment::STATUS_APPROVED,
                              'limit'=>5,
                              'order'=>'create_date DESC',

        ));

        $this->render('lastCommentWidget',array(
                 'lastComment'=>$lastComment,
        ));
    }
}