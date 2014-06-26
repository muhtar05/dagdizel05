<?php


class TournamentController extends Controller
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
                'actions'=>array('create','update','admin','delete','generate','sort'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
            ),

            array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


    /**
     * Возвращает данные о команде которая проводит матч у себя дома
     * @param $result
     * @return array
     */
    private function getPointMatchHome($result)
    {
        $matchInfo = array();
        $numbers = explode(':',$result);
        $numberOne = intval($numbers[0]);
        $numbersTwo = intval($numbers[1]);


        $matchInfo['win'] = 0;
        $matchInfo['draw'] = 0;
        $matchInfo['defeat'] = 0;

        if($numberOne>$numbersTwo)
        {
           $matchInfo['win'] = 1;
           $matchInfo['points'] = 3;
        }
        elseif($numberOne<$numbersTwo)
        {
           $matchInfo['defeat'] = 1;
           $matchInfo['points'] = 0;
        }
        else
        {
           $matchInfo['draw'] = 1;
           $matchInfo['points'] = 1;
        }

        return $matchInfo;


    }

    /**
     * Возвращает данные о команде которая проводит матч у себя дома
     * @param $result
     * @return array
     */
    private function getPointMatchGuest($result)
    {
        $matchInfo = array();
        $numbers = explode(':',$result);
        $numberOne = intval($numbers[0]);
        $numbersTwo = intval($numbers[1]);

        $matchInfo['win'] = 0;
        $matchInfo['draw'] = 0;
        $matchInfo['defeat'] = 0;

        if($numberOne<$numbersTwo)
        {
            $matchInfo['win'] = 1;
            $matchInfo['points'] = 3;
        }
        elseif($numberOne>$numbersTwo)
        {
            $matchInfo['defeat'] = 1;
            $matchInfo['points'] = 0;
        }
        else
        {
            $matchInfo['draw'] = 1;
            $matchInfo['points'] = 1;
        }
        return $matchInfo;

    }


    /**
     *    generate tournament table
     */
    public function actionGenerate()
    {
        $seasonId = SeasonYear::model()->find(array('condition'=>'current=2'))->id;
        $criteria = new CDbCriteria;
        $criteria->condition = "CURDATE()>date AND season_year=".$seasonId ;
        $criteria->order = 'tour ASC';

        $calendar = Calendar::model()->findAll($criteria);
        $teamsName = CHtml::listData(Teams::model()->findAll(),'id','name');


        $tournament = array(
                       1=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>1),
                       2=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>2),
                       3=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>3),
                       4=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>4),
                       5=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>5),
                       6=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>6),
                       7=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>7),
                       8=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>8),
                       9=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>9),
                       10=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>10),
                       11=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>11),
                       12=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>12),
                       13=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>13),
                       14=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>14),
                       15=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>15),
                       16=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>16),
                       17=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>17),
                       18=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>18),

        );



        $tournamentHome = array(
            1=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>1),
            2=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>2),
            3=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>3),
            4=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>4),
            5=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>5),
            6=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>6),
            7=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>7),
            8=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>8),
            9=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>9),
            10=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>10),
            11=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>11),
            12=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>12),
            13=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>13),
            14=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>14),
            15=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>15),
            16=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>16),
            17=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>17),
            18=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>18),
        );

        $tournamentGuest = array(
            1=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>1),
            2=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>2),
            3=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>3),
            4=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>4),
            5=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>5),
            6=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>6),
            7=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>7),
            8=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>8),
            9=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>9),
            10=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>10),
            11=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>11),
            12=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>12),
            13=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>13),
            14=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>14),
            15=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>15),
            16=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>16),
            17=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>17),
            18=>array('total_matches'=>0,'win'=>0,'draw'=>0,'defeat'=>0, 'goals_zab'=>0,'goals_prop'=>0,'points'=>0,'team_id'=>18),
        );





        foreach($calendar as $tour)
        {
           foreach($tour->resultCalendar as $match)
           {
                $tournament[$match->team_1]['total_matches'] +=1;
                $tournament[$match->team_2]['total_matches'] +=1;

                $matchInfo = $this->getPointMatchHome($match->result,$match->team_1);

                $tournament[$match->team_1]['win'] += $matchInfo['win'];
                $tournament[$match->team_1]['draw'] += $matchInfo['draw'];
                $tournament[$match->team_1]['defeat'] += $matchInfo['defeat'];
                $tournament[$match->team_1]['points'] += $matchInfo['points'];

                $tournamentHome[$match->team_1]['total_matches'] +=1;
                $tournamentHome[$match->team_1]['win'] += $matchInfo['win'];
                $tournamentHome[$match->team_1]['draw'] += $matchInfo['draw'];
                $tournamentHome[$match->team_1]['defeat'] += $matchInfo['defeat'];
                $tournamentHome[$match->team_1]['points'] += $matchInfo['points'];

                $matchInfo = $this->getPointMatchGuest($match->result,$match->team_2);

                $tournament[$match->team_2]['win'] += $matchInfo['win'];
                $tournament[$match->team_2]['draw'] += $matchInfo['draw'];
                $tournament[$match->team_2]['defeat'] += $matchInfo['defeat'];
                $tournament[$match->team_2]['points'] += $matchInfo['points'];

                $tournamentGuest[$match->team_2]['total_matches'] +=1;
                $tournamentGuest[$match->team_2]['win'] += $matchInfo['win'];
                $tournamentGuest[$match->team_2]['draw'] += $matchInfo['draw'];
                $tournamentGuest[$match->team_2]['defeat'] += $matchInfo['defeat'];
                $tournamentGuest[$match->team_2]['points'] += $matchInfo['points'];

           }
        }

        $dataPointsHome = array();
        foreach($tournamentHome as $key=>$arr)
        {
            $dataPointsHome[$key] = $arr['points'];
        }
        array_multisort($dataPointsHome,SORT_NUMERIC,$tournamentHome);

        TournamentHome::model()->deleteAll();

        $place = 18;
        foreach($tournamentHome as $key=>$data)
        {
             $model = new TournamentHome();
             $model->place = $place;
             $model->team_name = $data['team_id'];
             $model->points = $data['points'];
             $model->win = $data['win'];
             $model->draw = $data['draw'];
             $model->defeat = $data['defeat'];
             $model->total_matches = $data['total_matches'];

             $model->save();
             unset($model);
             $place--;

        }

        $dataPointsGuest = array();
        foreach($tournamentGuest as $key=>$arr)
        {
            $dataPointsGuest[$key] = $arr['points'];
        }
        array_multisort($dataPointsGuest,SORT_NUMERIC,$tournamentGuest);

        TournamentGuest::model()->deleteAll();

        $place = 18;
        foreach($tournamentGuest as $key=>$data)
        {
             $model = new TournamentGuest();
             $model->place = $place;
             $model->team_name = $data['team_id'];
             $model->points = $data['points'];
             $model->win = $data['win'];
             $model->draw = $data['draw'];
             $model->defeat = $data['defeat'];
             $model->total_matches = $data['total_matches'];

             $model->save();
             unset($model);
             $place--;

        }






        $resultInfo = 'Таблицы сгенерированы';
        $this->render('generate',array(
            'resultInfo'=>$resultInfo,
        ));

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


    public function actionSort(){
        if(isset($_POST['items']) && is_array($_POST['items'])){
            $i = 0;
            foreach($_POST['items'] as $item){
                $i++;
                $model = Tournament::model()->findByPk($item);
                $model->place = $i;
                $model->save();
            }
        }
    }

	/**
	 * Creates a new model
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tournament;

		if(isset($_POST['Tournament']))
		{
			$model->attributes=$_POST['Tournament'];
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

		if(isset($_POST['Tournament']))
		{
			$model->attributes=$_POST['Tournament'];
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
        $currentSeason = SeasonYear::model()->find(array(
            'condition'=>'current='.SeasonYear::SEASON_YEAR_CURRENT_ACTIVE
        ));
        $seasonId = $currentSeason->id;
        $criteria = new CDbCriteria;
        $criteria->condition = 'season_id=:season_id';
        $criteria->params = array(':season_id'=>$seasonId);
        $criteria->with = 'teams';

        $criteria->order = 'place ASC';

		$dataProvider=new CActiveDataProvider('Tournament',array(
                           'criteria'=>$criteria,
                           'pagination'=>array(
                               'pageSize'=>50,
                           ),
        ));

        $dataProviderHome = new CActiveDataProvider('TournamentHome',array(
                           'criteria'=>array(
                               'with'=>'teams',
                               'order'=>'points DESc',
                           ),
                           'pagination'=>array(
                               'pageSize'=>50,
                           ),
        ));

        $dataProviderGuest = new CActiveDataProvider('TournamentGuest',array(
                      'criteria'=>array(
                                'with'=>'teams',
                                'order'=>'points DESc',
    ),
                           'pagination'=>array(
                               'pageSize'=>50,
                           ),
        ));


		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'dataProviderHome'=>$dataProviderHome,
			'dataProviderGuest'=>$dataProviderGuest,

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
        $criteria->condition = 'season_id=:season_id';
        $criteria->params = array(':season_id'=>$seasonId);
        $criteria->order = 'place ASC';
		$dataProvider= new CActiveDataProvider('Tournament',array(
                                            'criteria'=>$criteria,
                                            'pagination'=>array(
                                                'pageSize'=>100,
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
	 * @return Tournament the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tournament::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tournament $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tournament-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
