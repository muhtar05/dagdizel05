<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 07.10.13
 * Time: 16:25
 * To change this template use File | Settings | File Templates.
 */

class OnlinematchController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('OnlineMatch');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }


    public function actionCreate()
    {
        $model = new OnlineMatch;

        if (isset($_POST['OnlineMatch']))
        {
            $model->attributes = $_POST['OnlineMatch'];
            if($model->save())
            {
                if (Yii::app()->request->isAjaxRequest)
                {
                    echo CJSON::encode(array(
                        'status'=>'success',
                        //'items'=>$items,
                    ));
                }
                else
                {
                    $this->redirect(array('index'));
                }
            }


        }

        $this->render('create',array(
            'model'=>$model,
        ));

    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['OnlineMatch']))
        {
            $model->attributes = $_POST['OnlineMatch'];
            if($model->save())
                $this->redirect('index');


        }

        $this->render('update',array('model'=>$model));
    }



    public function actionDelete($id)
    {

    }


    protected function loadModel($id)
    {
        $model = OnlineMatch::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'Bad request');
        return $model;
    }


}