<?php



class MatchController extends Controller
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
				'actions'=>array('index','view','online','getMatchesSeason'),
				'users'=>array('*'),
			),

            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('create','update','admin','delete','season'),
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
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id);
        $teamHomeInfo = Teams::model()->findByPk($model->team_home);
        $teamGuestInfo = Teams::model()->findByPk($model->team_guest);
		$this->render('view',array(
			'model'=>$model,
            'teamHomeInfo'=>$teamHomeInfo,
            'teamGuestInfo'=>$teamGuestInfo,
		));
	}

    public function actionOnline($id)
    {

        $this->layout = '//layouts/column1';
        $model = Match::model()->findByPk($id);
        $criteria = new CDbCriteria;
        $criteria->condition = 'match_id=:match_id';
        $criteria->params = array(':match_id'=>$model->id);
        $criteria->order = 'create_time DESC';

        $dataProvider=new CActiveDataProvider('OnlineMatchComment',array(
            'criteria'=>$criteria,
        ));


        $teamHomeInfo = Teams::model()->findByPk($model->team_home);
        $teamGuestInfo = Teams::model()->findByPk($model->team_guest);


        $playersHome = OnlineMatchPlayers::model()->findAll(array(
            'condition'=>'team_id=1 AND match_id='.$id,
        ));

        $playersGuest = OnlineMatchPlayers::model()->findAll(array(
            'condition'=>'team_id=2  AND match_id='.$id,
        ));

        $this->render('online',array(
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            'teamHomeInfo'=>$teamHomeInfo,
            'teamGuestInfo'=>$teamGuestInfo,
            'playersHome'=>$playersHome,
            'playersGuest'=>$playersGuest,
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Match;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Match']))
		{
			$model->attributes=$_POST['Match'];
			if($model->save())
                $this->redirect(array('admin','id'=>$model->season_year));
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

		if(isset($_POST['Match']))
		{

			$model->attributes = $_POST['Match'];
			if($model->save())
            {
                if(isset($_POST['returnUrl']))
                {
                   $this->redirect(array('/season/onlineMatchComment/admin/id/'.$model->id));
                }
                else {
				   $this->redirect(array('admin','id'=>$model->season_year));
                }
            }
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

        if(!empty($_GET['season_year']))
        {
            $seasonYear = urldecode($_GET["season_year"]);
            $criteriaSeasonName = new CDbCriteria;
            $criteriaSeasonName->compare('name',$seasonYear);
            $seasonId = SeasonYear::model()->find($criteriaSeasonName)->id;
        }
        else {
            $seasonId = SeasonYear::model()->find(array(
                       'condition'=>'current='.SeasonYear::SEASON_YEAR_CURRENT_ACTIVE
            ))->id;
        }

        if($seasonId == 0 && $seasonId === null)
            throw new CHttpException(404,'The requested page does not exist.');

		$criteria = new CDbCriteria;
        $criteria->condition = "season_year=".$seasonId;
        $criteria->order = 'date';

        $matches = Match::model()->findAll($criteria);
        $teams = CHtml::listData(Teams::model()->findAll(),'id','name');
        $months = Yii::app()->db->createCommand()
              ->select('DISTINCT MONTH(date) as month,YEAR(date) as year')
              ->from('dg_match mt')
              ->join('dg_season_year sy','mt.season_year = sy.id')
              ->where('mt.season_year='.$seasonId)
              ->order('mt.date')
              ->queryAll();


        $criteria = new CDbCriteria;
        $criteria->condition = 'date<NOW()';
        $criteria->order = 'date DESC';
        $criteria->limit = 1;
        $lastMatch = Match::model()->find($criteria);


		$this->render('index',array(
            'seasonYear'=>$seasonYear,
            'matches'=>$matches,
            'teams'=>$teams,
            'months'=>$months,
            'lastMatch'=>$lastMatch,
		));
	}

    public function actionGetMatchesSeason()
    {
        $seasonYear = $_POST['season_year'];
        $criteria = new CDbCriteria;
        $criteria->condition = 'season_year='.$seasonYear;
        $criteria->order = 'date';
        $matches = Match::model()->findAll($criteria);
        echo CJSON::encode($matches);
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
        $criteria->order = 'date ASC';
        $dataProvider = new CActiveDataProvider('Match',array(
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
	 * @return Match the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Match::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Match $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='match-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
