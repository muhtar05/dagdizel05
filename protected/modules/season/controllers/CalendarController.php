
<?php

Yii::import('team.models.Team');
class CalendarController extends Controller
{

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
				'actions'=>array('index','view'),
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
		$model=new Calendar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Calendar']))
		{
			$model->attributes=$_POST['Calendar'];
            $teamsOne = $_POST['Calendar']['team_1'];
            $teamsTwo = $_POST['Calendar']['team_2'];
            $resultOne = $_POST['Calendar']['result_1'];
            $resultTwo = $_POST['Calendar']['result_2'];

			if($model->save())
            {
                for($i=0;$i<count($teamsOne);$i++)
                {
                    $modelResult = new ResultsCalendar;
                    $modelResult->team_1 = $teamsOne[$i];
                    $modelResult->team_2 = $teamsTwo[$i];
                    $modelResult->result = $resultOne[$i].':'.$resultTwo[$i];
                    $modelResult->calendar_id = $model->id;
                    $modelResult->save();

                }
				$this->redirect(array('admin'));
            }
		}

		$this->render('create',array(
            'model'=>$model
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

        $criteria = new CDbCriteria;
        $criteria->condition = 'calendar_id=:calendar_id';
        $criteria->params = array(':calendar_id'=>$id);

        $calendarResults = ResultsCalendar::model()->findAll($criteria);


		if(isset($_POST['Calendar']))
		{
			$model->attributes=$_POST['Calendar'];
            $resultOne = $_POST['Calendar']['result_1'];
            $resultTwo = $_POST['Calendar']['result_2'];

			if($model->save())
            {
                $valid = true;
                foreach($calendarResults as $i=>$cresult)
                {
                    if(isset($_POST['ResultsCalendar'][$i]))
                    {
                        $cresult->attributes = $_POST['ResultsCalendar'][$i];
                        $cresult->result = $resultOne[$i].':'.$resultTwo[$i];
                    }
                    $valid = $cresult->validate() && $valid;
                    if($valid)
                        $cresult->save();
                }
                $this->redirect(array('admin'));
            }


		}

		$this->render('update',array(
			'model'=>$model,
            'calendarResults'=>$calendarResults,
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

        if(!empty($_GET['season_year']))
        {
            $seasonYear = urldecode($_GET["season_year"]);
            $criteriaSeasonName = new CDbCriteria;
            $criteriaSeasonName->compare('name',$seasonYear);
            $seasonId = SeasonYear::model()->find($criteriaSeasonName)->id;
        }
        else {
            $seasonId = SeasonYear::model()->find(array('condition'=>'current=2'))->id;
        }

        if($seasonId == 0 && $seasonId === null)
            throw new CHttpException(404,'The requested page does not exist.');



        $criteria = new CDbCriteria;
        $criteria->condition = "season_year=".$seasonId;
        $criteria->order = 'date';
		$dataProvider=new CActiveDataProvider('Calendar',array(
                             'criteria'=>$criteria,
                             'pagination'=>array(
                                 'pageSize'=>100,
                             )
        ));

        $teams = CHtml::listData(Teams::model()->findAll(),'id','name');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'teams'=>$teams,
            'seasonYear'=>$seasonYear,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $seasonId = Yii::app()->request->getQuery('id',null);
        if (null === $seasonId){
            $currentSeason = SeasonYear::model()->find(array(
                'condition'=>'current='.SeasonYear::SEASON_YEAR_CURRENT_ACTIVE
            ));
            $seasonId = $currentSeason->id;
        }else {
            $currentSeason = SeasonYear::model()->findByPk($seasonId);
        }
        $seasonYears = SeasonYear::model()->findAll();

        $criteria = new CDbCriteria;
        $criteria->condition = 'season_year=:season_year';
        $criteria->params = array(':season_year'=>$seasonId);
        $criteria->order = 'tour ASC';
        $dataProvider = new CActiveDataProvider('Calendar',array(
                             'criteria'=>$criteria,
                             'pagination'=>array(
                                 'pageSize'=>50,
                             )
        ));

		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
            'seasonYears'=>$seasonYears,
            'currentSeason'=>$currentSeason,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Calendar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Calendar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Calendar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='calendar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
