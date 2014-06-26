<?php

class GalleryphotoController extends Controller
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

            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('create','update','admin','delete','category','setmain','sort'),
                'users'=>User::model()->getUsersAccessArrayByRole(User::ADMIN),
            ),

            array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


    public function actionSort()
    {
        if (isset($_POST['items']) && is_array($_POST['items']))
        {
            $i = 0;
            foreach($_POST['items'] as $item)
            {
                $i++;
                $menuModel = GalleryPhoto::model()->findByPk($item);
                $menuModel->pos = $i;
                $menuModel->save();
            }


        }
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


    public function actionSetmain($id)
    {
        $model = $this->loadModel($id);
        $galleryParent = Gallery::model()->findByPk($model->gallery_id);
        $galleryParent->main_photo = $model->img;
        if($galleryParent->save()){
            $this->redirect(array('category','id'=>$model->gallery_id));
        }
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GalleryPhoto;


		if(isset($_POST['GalleryPhoto']))
		{

            $model->attributes = $_POST['GalleryPhoto'];
			$images = CUploadedFile::getInstances($model,'img');

            if (isset($images) && count($images)>0)
            {

                foreach($images as $image =>$pic)
                {
                    $path = time() . rand(0, 100) . '.' . $pic->getExtensionName();
                    if ($result = $pic->saveAs(Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . GalleryPhoto::UPLOAD_DIR . DIRECTORY_SEPARATOR . $model->gallery_id . DIRECTORY_SEPARATOR . $path))
                    {
                        $addImage = new GalleryPhoto();
                        $addImage->img = $path;
                        $addImage->gallery_id = $model->gallery_id;
                        $addImage->save();
                    }
//            )
                }

            }

            $this->redirect(array('category','id'=>$model->gallery_id));

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

		if(isset($_POST['GalleryPhoto']))
		{
			$model->attributes=$_POST['GalleryPhoto'];
			if($model->save())
                $this->redirect(array('category','id'=>$model->gallery_id));
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
        $model = $this->loadModel($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('category'));
	}


    public function actionCategory($id)
    {
        $criteria = new CDbCriteria;
        $criteria->compare('gallery_id',$id,true);
        $criteria->order = 'pos ASC';
        $dataProvider = new CActiveDataProvider('GalleryPhoto',array(
                       'criteria'=>$criteria,
                       'pagination'=>array(
                           'pageSize'=>100,
                       )
        ));
        $galleryInfo = Gallery::model()->findByPk($id);

        $this->render('category',array(
            'dataProvider'=>$dataProvider,
            'galleryName'=>$galleryInfo->name,
            'galleryId'=>$galleryInfo->id,
        ));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GalleryPhoto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GalleryPhoto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GalleryPhoto']))
			$model->attributes=$_GET['GalleryPhoto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GalleryPhoto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GalleryPhoto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GalleryPhoto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-photo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
