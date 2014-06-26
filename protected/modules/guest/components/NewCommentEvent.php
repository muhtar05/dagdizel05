<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 24.12.13
 * Time: 23:50
 * To change this template use File | Settings | File Templates.
 */

class NewCommentEvent extends CModelEvent
{
    public $comment;
    public $post;

}