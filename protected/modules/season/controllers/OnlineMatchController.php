<?php

class OnlineMatchController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
		//	'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','viewAdmin','create','update'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


    public function actionViewAdmin($id)
    {
        $this->layout='//layouts/column2';
        $model = $this->loadModel($id);
        $criteria = new CDbCriteria;
        $criteria->condition = 'onlineMatch_id=:onlineMatch_id';
        $criteria->params = array(':onlineMatch_id'=>$id);
        $criteria->order = 'create_time DESC';

        $dataProvider=new CActiveDataProvider('OnlineMatchComment',array(
            'criteria'=>$criteria,
        ));

        $playersHome = OnlineMatchPlayers::model()->findAll(array(
            'condition'=>'team_id=1 AND onlineMatch_id='.$id,
        ));

        $playersGuest = OnlineMatchPlayers::model()->findAll(array(
            'condition'=>'team_id=2  AND onlineMatch_id='.$id,
        ));




        $this->render('viewAdmin',array(
            'dataProvider'=>$dataProvider,
            'modelOnlineMatch'=>$model,
            'playersHome'=>$playersHome,
            'playersGuest'=>$playersGuest,
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new OnlineMatch;
        $model->match_id = $id;
        $model->status = 1;
        if($model->save())
            $this->redirect(array('viewAdmin','id'=>$id));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OnlineMatch']))
		{
			$model->attributes=$_POST['OnlineMatch'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OnlineMatch');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OnlineMatch('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OnlineMatch']))
			$model->attributes=$_GET['OnlineMatch'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OnlineMatch the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OnlineMatch::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OnlineMatch $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='online-match-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
