<?php

class CommentController extends Controller
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','changeRating'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::USER),
            ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update','delete','create','changeRating','create'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



    /**
     *  Change Rating
     */
    public function actionChangeRating()
    {
        $type = $_POST['type'];
        $comment_id = $_POST['comment_id'];

        if(!Yii::app()->user->isGuest) {
            $user_id = Yii::app()->user->id;
            $exists = CommentRating::model()->exists('comment_id=:comment_id AND user_id=:user_id',array(':comment_id'=>$comment_id,':user_id'=>$user_id));
            if(!$exists && $type==1)
            {
                $model = new CommentRating();
                $model->comment_id = $comment_id;
                $model->user_id = $user_id;
                $model->save();
            }

            if ($exists && $type ==2)
            {
                $model = CommentRating::model()->find('comment_id=:comment_id AND user_id=:user_id',array(':comment_id'=>$comment_id,':user_id'=>$user_id));
                $model->delete();
            }

        }

        $count = CommentRating::model()->count('comment_id=:comment_id',array(':comment_id'=>$comment_id));

        echo $count;
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['Comment']))
		{
			$model->attributes=$_POST['Comment'];
			if($model->saveNode())
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
		$this->loadModel($id)->deleteNode();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comment']))
			$model->attributes=$_GET['Comment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Comment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Comment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
