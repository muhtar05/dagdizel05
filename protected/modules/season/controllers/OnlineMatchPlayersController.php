<?php

class OnlineMatchPlayersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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



    public function actionAddEvent()
    {
        if (!empty($_POST))
        {
            $model = new OnlinePlayersEvents();
            $model->type_event = $_POST['event'];
            $model->player_id = $_POST['playerId'];
            $model->save();
        }
        Yii::app()->end();
    }



    public function actionCreatePlayer()
    {
        $model = new OnlineMatchPlayers;
        $model->name = $_POST['OnlineMatchPlayers']['name'];
        $model->number = $_POST['OnlineMatchPlayers']['number'];
        $model->team_id = $_POST['OnlineMatchPlayers']['team_id'];
        $model->match_id = $_POST['OnlineMatchPlayers']['match_id'];
        $model->save();

        $players = OnlineMatchPlayers::model()->findAll(array(
                                            'condition'=>'team_id='.$model->team_id.' AND match_id='.$model->match_id,

        ));

        foreach($players as $player)
        {
            echo "<div>";
            echo $player->number.'  '.$player->name;
            echo "<span data-id='$player->id' class='glyphicon glyphicon-remove'></span>
                  ";

        }

        Yii::app()->end();
    }


    public function actionDeletePlayer()
    {
        $id = intval($_GET['id']);
        $this->loadModel($id)->delete();
        echo 'ok';
    }


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OnlineMatchPlayers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OnlineMatchPlayers']))
		{
			$model->attributes=$_POST['OnlineMatchPlayers'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['OnlineMatchPlayers']))
		{
			$model->attributes=$_POST['OnlineMatchPlayers'];
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
		$dataProvider=new CActiveDataProvider('OnlineMatchPlayers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OnlineMatchPlayers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OnlineMatchPlayers']))
			$model->attributes=$_GET['OnlineMatchPlayers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OnlineMatchPlayers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OnlineMatchPlayers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OnlineMatchPlayers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='online-match-players-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
