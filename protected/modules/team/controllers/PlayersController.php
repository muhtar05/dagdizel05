<?php

class PlayersController extends Controller
{
    /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index','view','getBornDate','allBorn'),
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
        $this->layout = '//layouts/column1';
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    public function actionAllBorn()
    {
        $this->layout = '//layouts/column1';
        $sql = "SELECT IF( DAYOFYEAR( born_date ) < DAYOFYEAR( CURDATE( ) ) , 366 + DAYOFYEAR( born_date ) , DAYOFYEAR( born_date ) ) AS born, id, born_date,fio,'Players' AS type_model
                          FROM  `dg_players` WHERE DAYOFYEAR(born_date) IS NOT NULL
                UNION
                SELECT IF( DAYOFYEAR( born_date ) < DAYOFYEAR( CURDATE( ) ) , 366 + DAYOFYEAR( born_date ) , DAYOFYEAR( born_date ) ) AS born,id, born_date,fio,'Coaches' AS type_model
                          FROM dg_coaches WHERE DAYOFYEAR(born_date) IS NOT NULL
                UNION
                SELECT IF( DAYOFYEAR( born_date ) < DAYOFYEAR( CURDATE( ) ) , 366 + DAYOFYEAR( born_date ) , DAYOFYEAR( born_date ) ) AS born,id, born_date,fio,'Personal' AS type_model
                FROM dg_personal WHERE DAYOFYEAR(born_date) IS NOT NULL

                ORDER BY born
                ";

        $bornDateMans = Yii::app()->db->createCommand($sql)->queryAll();


        $this->render('allborn',array(
              'bornDateMans'=>$bornDateMans,
        ));
    }


    public function actionGetBornDate()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $type = $_POST['type'];
            $bornDate = $_POST['borndate'];
            $usl = ($_POST['type'] == 1) ? '<=' : '>=';


            $players = Players::model()->findAll($criteria);

            $htmlData = '';
            $item = 0;
            foreach($players as $player)
            {
                $item++;
                $imageUrl = $player->findIMGByResolution('107x136', 'height');

                $className = ($item == 1)? 'first-born' : 'two-born';

                $currenDateInfo = getdate();
                $currentYear = $currenDateInfo['year'];

                $timestamp = CDateTimeParser::parse($player->born_date,'yyyy-MM-dd HH:mm:ss');
                $formater = new CDateFormatter('ru_RU');
                echo $formater->format("d.MM.", $timestamp).$currentYear;

                $htmlData .= "<div class='col-md-6 col-sm-6 {$className}'>
                                 <div class='born_item'>
                                     <span class='pull-left'>
                                        <h4>{$player->fio}</h4>
                                        <p>{$player->born_date} исполнится </p>
                                     </span>
                                      <img src='".$imageUrl."'  width='107' height='136' class='pull-right img-responsive'/>
                                 </div>
                              </div>";

            }
            echo $htmlData;
            Yii::app()->end();

        }
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Players;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
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

		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
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
		$dataProvider=new CActiveDataProvider('Players',array(
                           'pagination'=>array(
                               'pageSize'=>100,
                           )
        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}



	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new Players('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Players']))
			$model->attributes=$_GET['Players'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Players the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Players::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Players $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='players-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
