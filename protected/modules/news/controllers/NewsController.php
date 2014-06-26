<?php

class NewsController extends Controller
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
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index', 'show'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionShow($id_altTitle) {
        $this->layout = '//layouts/column1';
        $explodeArr = explode('_', $id_altTitle);

        $model = $this->loadModel($explodeArr[0]);

        $criteria = new CDbCriteria;
        $criteria->condition = 'is_main = 0 and id <> '.$model->id;
        $criteria->order = 'date DESC';

        $dataProvider=new CActiveDataProvider('News',array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize'=>10
            )
        ));

        $topNews = News::model()->findAll(array('condition' => 'is_main = 1 and id <> '.$model->id, 'order' => 'date DESC'));

        $this->render('show', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'topNews' => $topNews
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new News;

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if($model->save())
				$this->redirect(array('admin'));
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

        $this->layout = '//layouts/column1';
        $criteria = new CDbCriteria;
        $criteria->condition = 'is_main = 0';
        $criteria->order = 'date DESC';

		$dataProvider=new CActiveDataProvider('News',array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize'=>10
            )
        ));

        $topNews = News::model()->findAll(array('condition' => 'is_main = 1', 'order' => 'date DESC'));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'topNews' => $topNews
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
