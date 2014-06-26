<?php

class PostController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';



    public function actions(){
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',

            ),
        );
    }

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
				'actions'=>array('index','view','changeRating','preview','captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changeRating','captcha'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::USER),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','admin','delete','update','changeRating','captcha'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



    public function actionPreview()
    {
        $purifier = new CHtmlPurifier();
        echo $purifier->purify($_POST['data']);
    }


    /**
     *  Change Rating
     */
    public function actionChangeRating()
    {
          $type = $_POST['type'];
          $post_id = $_POST['post_id'];
          if(!Yii::app()->user->isGuest)
          {

              $user_id = Yii::app()->user->id;
              $exists = PostRating::model()->exists('post_id=:post_id AND user_id=:user_id',array(':post_id'=>$post_id,':user_id'=>$user_id));
              if(!$exists && $type==1)
              {
                  $model = new PostRating;
                  $model->post_id = $post_id;
                  $model->user_id = $user_id;
                  $model->save();
              }

              if ($exists && $type ==2)
              {
                  $model = PostRating::model()->find('post_id=:post_id AND user_id=:user_id',array(':post_id'=>$post_id,':user_id'=>$user_id));
                  $model->delete();
              }

          }

        $count = PostRating::model()->count('post_id=:post_id',array(':post_id'=>$post_id));

        echo $count;
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $user_id = "post".$id;
        if($_SESSION[$user_id]!=$id)
        {
            Post::model()->updateCounters(array('browsing'=>1), "id=".$id);
            $_SESSION[$user_id]=$id;
        }
        $modelLogin = new LoginForm();
        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $modelLogin->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($modelLogin->validate() && $modelLogin->login())
            {
                $this->refresh();
            }

        }
        $model = $this->loadModel($id);
        $comment = $this->newComment($model);
		$this->render('view',array(
			'model'=>$model,
            'comment'=>$comment,
            'modelLogin'=>$modelLogin,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
            $model->user_id = Yii::app()->user->id;
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

        if(Yii::app()->user->id !== $model->user_id)
            throw new CHttpException(403,"Доступ запрещен");

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
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
        $modelLogin = new LoginForm();
        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $modelLogin->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($modelLogin->validate() && $modelLogin->login())
            {
                $this->refresh();
            }

        }
        $criteria = new CDbCriteria;
        $criteria->order = 'date DESC';
		$dataProvider=new CActiveDataProvider('Post',array(
                   'criteria'=>$criteria,
                   'pagination'=>array(
//                       'pageSize'=>3,
                   )
        ));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'modelLogin'=>$modelLogin,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->layout = 'admin.views.main';
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


    /**
     * Creates a new comment.
     * This method attempts to create a new comment based on the user input.
     * If the comment is successfully created, the browser will be redirected
     * to show the created comment.
     * @param Post the post that the new comment belongs to
     * @return Comment the comment instance
     */
    protected function newComment($post)
    {
        $comment=new Comment;
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if(isset($_POST['Comment']))
        {
            $comment->attributes=$_POST['Comment'];
            if($post->addComment($comment))
            {
                if($comment->status==Comment::STATUS_PENDING)
                    Yii::app()->user->setFlash('commentSubmitted','Спасибо за комментарий.Ваш комментарий будет опубликован после премодерации.');
                $this->refresh();
            }
        }
        return $comment;
    }
}
