<?php

/**
 * This is the model class for table "{{tournament}}".
 *
 * The followings are the available columns in table '{{tournament}}':
 * @property integer $id
 * @property integer $place
 * @property string $team_name
 * @property integer $total_matches
 * @property integer $win
 * @property integer $draw
 * @property integer $defeat
 * @property string $goal_stat
 * @property integer $points
 * @property integer $season_id
 */
class Tournament extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tournament}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('place, team_name, total_matches, win, draw, defeat, goal_stat, points', 'required'),
			array('place, total_matches, win, draw, defeat, points', 'numerical', 'integerOnly'=>true),
			array('team_name', 'length', 'max'=>100),
			array('goal_stat', 'length', 'max'=>50),
            array('season_id','safe'),
			array('id, place, team_name, total_matches, win, draw, defeat, goal_stat, points', 'safe', 'on'=>'search'),
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
            'teams'=>array(self::BELONGS_TO,'Teams','team_name'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'place' => 'Место',
			'team_name' => 'Команда',
			'total_matches' => 'И',
			'win' => 'В',
			'draw' => 'Н',
			'defeat' => 'П',
			'goal_stat' => 'М',
			'points' => 'О',
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
		$criteria->compare('place',$this->place);
		$criteria->compare('team_name',$this->team_name,true);
		$criteria->compare('total_matches',$this->total_matches);
		$criteria->compare('win',$this->win);
		$criteria->compare('draw',$this->draw);
		$criteria->compare('defeat',$this->defeat);
		$criteria->compare('goal_stat',$this->goal_stat,true);
		$criteria->compare('points',$this->points);
        $criteria->compare('session_id',$this->season_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>20,
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tournament the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
