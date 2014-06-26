<?php

/**
 * This is the model class for table "{{results_calendar}}".
 *
 * The followings are the available columns in table '{{results_calendar}}':
 * @property integer $id
 * @property string $team_1
 * @property string $team_2
 * @property string $result
 * @property integer $calendar_id
 */
class ResultsCalendar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{results_calendar}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('team_1, team_2, calendar_id', 'required'),
			array('calendar_id', 'numerical', 'integerOnly'=>true),
			array('team_1, team_2', 'length', 'max'=>255),
			array('result', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, team_1, team_2, result, calendar_id', 'safe', 'on'=>'search'),
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

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'team_1' => 'Team 1',
			'team_2' => 'Team 2',
			'result' => 'Result',
			'calendar_id' => 'Calendar',
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
		$criteria->compare('team_1',$this->team_1,true);
		$criteria->compare('team_2',$this->team_2,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('calendar_id',$this->calendar_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResultsCalendar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
