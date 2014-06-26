<?php

class TableresultController extends Controller
{


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TableResult;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TableResult']))
		{
			$model->attributes=$_POST['TableResult'];
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

		if(isset($_POST['TableResult']))
		{
			$model->attributes=$_POST['TableResult'];
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
        header('Content-Type: text/html; charset=utf-8');
        $result = TableResult::model()->findAll();
        $columns = TableResult::model()->getAttributes();


        foreach($result as $keyResult=>$value)
        {
             print $value->name;
             $kol = 0;
             $totalPoints = 0;
             print "Home matches: ";
             foreach($columns as $key=>$column)
             {

                 if(($key === 'id') || ($key === 'name'))
                     continue;

                 if(($value->$key !== null) && ($value->$key !== 'team'))
                 {
                     $kol++;
                     $totalPoints += $this->getPointMatchHome($value->$key);
                     print $value->$key;
                     print '('.$this->getPointMatchHome($value->$key).') | ';
                 }
             }
             print "Guest matches:";
             foreach($result as $valueColumn)
             {
                 $keyColumn =  'team_'.$value->id;
                 if (($valueColumn->$keyColumn !== null) && ($valueColumn->$keyColumn !== 'team'))
                 {
                     $kol++;
                     $totalPoints += $this->getPointMatchGuest($valueColumn->$keyColumn);
                     print $valueColumn->$keyColumn;
                     print '('.$this->getPointMatchGuest($valueColumn->$keyColumn).') | ';
                 }


             }

             print $totalPoints.'<br />';
        }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TableResult('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TableResult']))
			$model->attributes=$_GET['TableResult'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TableResult the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TableResult::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TableResult $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='table-result-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



    private function getPointMatchHome($result)
    {
        $numbers = explode(':',$result);
        $numberOne = intval($numbers[0]);
        $numbersTwo = intval($numbers[1]);

        if($numberOne>$numbersTwo)
            return 3;
        elseif($numberOne<$numbersTwo)
            return 0;
        else
            return 1;

    }


    private function getPointMatchGuest($result)
    {
        $numbers = explode(':',$result);
        $numberOne = intval($numbers[0]);
        $numbersTwo = intval($numbers[1]);

        if($numberOne<$numbersTwo)
            return 3;
        elseif($numberOne>$numbersTwo)
            return 0;
        else
            return 1;

    }


    public function actionSaveresult()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $id = $_POST['resultId'];
            $columName = $_POST['columnName'];
            $result = $_POST['result'];
            $model = TableResult::model()->findByPk($id);
            $model->$columName = $result;
            $model->save();
            echo $result;
            Yii::app()->end();
        }

    }



}
