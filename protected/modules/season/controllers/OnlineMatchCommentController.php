<?php

class OnlineMatchCommentController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','updateComment','deleteComment'),
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


    public function actionDeleteComment()
    {
        $id = intval($_GET['id']);
        $this->loadModel($id)->delete();
        echo 'ok';
    }

    public function actionUpdateComment()
    {
         if(Yii::app()->request->isAjaxRequest)
         {
             $id = intval($_POST['id-comment']);
             $text = $_POST['text-comment'];
             $minute = $_POST['minute-comment'];
             $typeComment = $_POST['type-comment'];

             $model = $this->loadModel($id);
             $model->text = $text;
             $model->minute = $minute;
             $model->type_comment = $typeComment;
             $model->save();

             $output = '';

             $output .='<div class="col-md-12 col-sm-12 online-comment-item">
                           <form>
                             <div class="row">
                                 <div class="col-md-1 col-sm-2 type-comment">'.
                                   $model->type_comment.'
                                 </div>

                                 <div class="col-md-1 col-sm-2 minute-comment">'.
                                   $model->minute.'
                                 </div>

                                 <div class="col-md-8 col-sm-8 text-comment">'.
                                   $model->text.'
                                </div>

                                  <div class="col-md-2 col-sm-2 text-comment">
                                       <span data-id="'.$model->id.'" class="glyphicon glyphicon-edit"></span>
                                       <span data-id="'.$model->id.'" class="glyphicon glyphicon-remove"></span>
                                </div>
                             </div>
                             </form>
                           </div>';
             echo $output;
             Yii::app()->end();


         }
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OnlineMatchComment;

        if(Yii::app()->request->isAjaxRequest)
        {
            $model->text = $_POST['OnlineMatchComment']['text'];
            $model->match_id = $_POST['OnlineMatchComment']['match_id'];
            $model->minute = $_POST['OnlineMatchComment']['minute'];
            $model->type_comment = $_POST['OnlineMatchComment']['type_comment'];
            $model->save();

            $playerId = $_POST['playerId'];
            $arrEvents = array(2,4,5);

            if (in_array($_POST['OnlineMatchComment']['type_comment'],$arrEvents))
            {

                $modelEvent = new OnlinePlayersEvents();
                $modelEvent->type_event = $_POST['OnlineMatchComment']['type_comment'];
                $modelEvent->player_id = $playerId;
                $modelEvent->save();

                if ($_POST['OnlineMatchComment']['type_comment'] == 2)
                {
                    $plaersInfo = OnlineMatchPlayers::model()->findByPk($playerId);

                    $modelMatch = Match::model()->findByPk($model->match_id);
                    $resultInfo = explode(':',$modelMatch->result);
                    if ($plaersInfo->team_id == 1)
                    {
                       $modelMatch->goals_home .= $plaersInfo->name.','.$model->minute.' ;';
                       $resultOne = intval($resultInfo[0]) + 1;
                       $result = $resultOne.':'.$resultInfo[1];
                    }
                    else
                    {
                        $modelMatch->goals_guest .= $plaersInfo->name.','.$model->minute.' ;';
                        $resultTwo = intval($resultInfo[1]) + 1;
                        $result = $resultInfo[0].':'.$resultTwo;
                    }

                    $modelMatch->result = $result;

                    $modelMatch->save();
                }


            }




            $onlineComments = OnlineMatchComment::model()->findAll(array(
                                          'condition'=>'match_id=:match_id',
                                          'params'=>array(':match_id'=>$model->match_id),
                                          'order'=>'create_time DESC',

            ));
            $output = '';
            foreach($onlineComments as $comment)
            {
                $output .='<div class="col-md-12 col-sm-12 online-comment-item">
                             <div class="row">
                                 <div class="col-md-1 col-sm-2 type-comment">'.
                                    CHtml::encode($comment->type_comment).'
                                 </div>

                                 <div class="col-md-1 col-sm-2 minute-comment">'.
                                    CHtml::encode($comment->minute).'
                                 </div>

                                 <div class="col-md-8 col-sm-8 text-comment">'.
                                   CHtml::encode($comment->text).'
                                </div>

                                  <div class="col-md-2 col-sm-2 text-comment">
                                       <span data-id="'.$comment->id.'" class="glyphicon glyphicon-edit"></span>
                                       <span data-id="'.$comment->id.'" class="glyphicon glyphicon-remove"></span>
                                </div>
                             </div>
                           </div>';

            }
            echo $output;
            Yii::app()->end();
        }

		if(isset($_POST['OnlineMatchComment']))
		{
			$model->attributes=$_POST['OnlineMatchComment'];
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

		if(isset($_POST['OnlineMatchComment']))
		{
			$model->attributes=$_POST['OnlineMatchComment'];
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

		$dataProvider=new CActiveDataProvider('OnlineMatchComment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
        $this->layout='//layouts/column2';
        $match = Match::model()->findByPk($id);
        $criteria = new CDbCriteria;
        $criteria->condition = 'match_id=:match_id';
        $criteria->params = array(':match_id'=>$id);
        $criteria->order = 'create_time DESC';


        $playersHome = OnlineMatchPlayers::model()->findAll(array(
            'condition'=>'team_id=1 AND match_id='.$id,
        ));

        $playersGuest = OnlineMatchPlayers::model()->findAll(array(
            'condition'=>'team_id=2  AND match_id='.$id,
        ));

        $teamHomeInfo = Teams::model()->findByPk($match->team_home);
        $teamGuestInfo = Teams::model()->findByPk($match->team_guest);




        $dataProvider=new CActiveDataProvider('OnlineMatchComment',array(
                                    'criteria'=>$criteria,
                                    'pagination'=>array(
                                        'pageSize'=>500,
                                    )
        ));


		$this->render('admin',array(
            'dataProvider'=>$dataProvider,
            'match'=>$match,
            'playersHome'=>$playersHome,
            'playersGuest'=>$playersGuest,
            'teamHomeInfo'=>$teamHomeInfo,
            'teamGuestInfo'=>$teamGuestInfo,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OnlineMatchComment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OnlineMatchComment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OnlineMatchComment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='online-match-comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
