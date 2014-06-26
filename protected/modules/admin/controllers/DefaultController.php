<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 18.11.13
 * Time: 19:40
 * To change this template use File | Settings | File Templates.
 */

class DefaultController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations

        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(

            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }
}