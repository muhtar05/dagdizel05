<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 07.10.13
 * Time: 14:10
 * To change this template use File | Settings | File Templates.
 */

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }

}