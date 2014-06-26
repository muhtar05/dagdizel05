<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 08.01.14
 * Time: 21:23
 * To change this template use File | Settings | File Templates.
 */
Yii::import('news.models.News');
Yii::import('video.models.Video');
Yii::import('gallery.models.Gallery');
Yii::import('season.models.Match');
Yii::import('team.models.Players');
Yii::import('team.models.Personal');
Yii::import('team.models.Coaches');
class SearchController extends Controller
{


    public function actionSearch()
    {


        if(($term = Yii::app()->getRequest()->getParam('q',null)) !== null && (!empty($term)))
        {

            $criteriaPlayers = new CDbCriteria();
            $criteriaPlayers->addSearchCondition('firstname',$term,true);
            $criteriaPlayers->addSearchCondition('lastname',$term,true,'OR');
            
            $players = Players::model()->findAll($criteriaPlayers);



            $criteriaCoaches = new CDbCriteria();
            $criteriaCoaches->addSearchCondition('fio',$term,true);

            $coaches = Coaches::model()->findAll($criteriaCoaches);


            $criteriaPersonal = new CDbCriteria();
            $criteriaPersonal->addSearchCondition('fio',$term,true);

            $personal = Personal::model()->findAll($criteriaPersonal);



            $criteriaNews = new CDbCriteria();
            $criteriaNews->addSearchCondition('title',$term,true);
            $criteriaNews->addSearchCondition('text',$term,true,'OR');
            $news = News::model()->findAll($criteriaNews);


            $criteriaVideo = new CDbCriteria();
            $criteriaVideo->addSearchCondition('name',$term,true);
            $criteriaVideo->addSearchCondition('description',$term,true,'OR');

            $video = Video::model()->findAll($criteriaVideo);


            $criteriaGallery = new CDbCriteria();
            $criteriaGallery->addSearchCondition('name',$term,true);
            $criteriaGallery->addSearchCondition('description',$term,true,'OR');

            $gallery = Gallery::model()->findAll($criteriaGallery);



            $criteriaMatch = new CDbCriteria();
            $criteriaMatch->addSearchCondition('text',$term,true);

            $match = Match::model()->findAll($criteriaMatch);



        }

        $this->render('search',array(
            'news'=>$news,
            'video'=>$video,
            'gallery'=>$gallery,
            'match'=>$match,
            'players'=>$players,
            'personal'=>$personal,
            'coaches'=>$coaches,
        ));
    }

}