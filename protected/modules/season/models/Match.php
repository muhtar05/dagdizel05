<?php

/**
 * This is the model class for table "{{match}}".
 *
 * The followings are the available columns in table '{{match}}':
 * @property integer $id
 * @property string $label
 * @property string $text
 * @property string $team_1
 * @property string $team_2
 * @property string $team_home
 * @property string $team_guest
 * @property string $goals_home
 * @property string $goals_guest
 * @property string $date
 * @property integer $tournament_id
 * @property integer $season_year
 */
class Match extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

    const UPLOAD_DIR = 'images/season/match';
    const STATUS_MATCH_ANONS = 1;
    const STATUS_MATCH_ONLINE = 2;
    const STATUS_MATCH_END = 3;

	public function tableName()
	{
		return '{{match}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('status,date,team_home,team_guest', 'required'),
			array('tournament_id,season_year,description,place,result,tour,text,warnings,removal,arbitrs,goals_home,goals_guest', 'safe'),
            array('img','file','types'=>'jpg,gif,png,jpeg','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, text, date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'seasonYear'=>array(self::BELONGS_TO,'SeasonYear','season_year'),
            'countComment'=>array(self::STAT,'OnlineMatchComment','match_id'),
		);
	}



    public function behaviors()
    {
        return array(
            'imageUploadBehavior'=>array(
                'class'=>'ImageUploadBehavior',
                'uploadPath'=>'upload/images/season/match',
                'imageField'=>'img',
            ),

            'imageCachedResolution' => array(
                'class' => 'application.behaviors.ImageCachedResolutionBehavior',
            ),

        );
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'label'=>'Заголовок матча',
			'text' => 'Text',
			'team_1' => 'Состав1',
			'team_2' => 'Состав2',
            'team_home'=>'Команда(Дома)',
            'team_guest'=>'Команда(Гость)',
            'warnings'=>'Предупреждения',
            'removal'=>'Удаления',
            'goals'=>'Голы',
            'arbitrs'=>'Судья',
			'date' => 'Дата проведения',
            'tournament_id'=>'Турнир',
            'tour'=>'Тур',
            'place'=>'Место проведения',
            'result'=>'Счет матча',
            'season_year'=>'Сезон',
            'description'=>'Инфо о матче',
            'status'=>'Статус матча',
            'goals_home'=>'Голы хозяев',
            'goals_guest'=>'Голы гостей',
            'img'=>'Фото',
            'text'=>'Текст',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('season_year',$this->season_year);
        $criteria->order = 'date ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>34,
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Match the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function getDate(){
        return $this->date;
    }


    /**
     * Возвращаем количество туров
     * @return array
     */

    public static function getTours()
    {
        $tours = array();
        for($i=1;$i<(18*2-1);$i++)
        {
           $tours[$i] = $i;
        }
        return $tours;
    }



    public function getMatchResult()
    {
        $dagdizelInfo = Teams::model()->find(array('condition'=>'main=1'));
        $resultsInfo = explode(":",$this->result);
        $resultsInfoOne = intval($resultsInfo[0]);
        $resultsInfoTwo = intval($resultsInfo[1]);

        if ($dagdizelInfo->id == $this->team_home)
        {
            if($resultsInfoOne>$resultsInfoTwo)
                $result = 'win';
            elseif($resultsInfoOne<$resultsInfoTwo)
                $result = 'defeat';
            else
                $result = 'draw';
        }
        else
        {
            if($resultsInfoOne>$resultsInfoTwo)
                $result = 'defeat';
            elseif($resultsInfoOne<$resultsInfoTwo)
                $result = 'win';
            else
                $result = 'draw';
        }
        return $result;


    }



    public function getPhotoPath()
    {
        return Yii::app()->baseUrl . '/upload/' . self::UPLOAD_DIR . "/";
    }

    public function getPhotoName()
    {
        return $this->img;
    }

    public function getPhotoSrc()
    {
        return $this->getPhotoPath() . "/" . $this->getPhotoName();
    }


    protected  function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->label = Teams::model()->findByPk($this->team_home)->name.'-'.Teams::model()->findByPk($this->team_guest)->name;
            $this->result = $_POST['Match']['result_1'].':'.$_POST['Match']['result_2'];
            return true;
        }
        else
        {
            return false;
        }

    }

}
