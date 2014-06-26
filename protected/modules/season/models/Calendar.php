<?php

/**
 * This is the model class for table "{{calendar}}".
 *
 * The followings are the available columns in table '{{calendar}}':
 * @property integer $id
 * @property integer $tour
 * @property integer $season_year
 * @property string $date
 */
class Calendar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{calendar}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tour, season_year, date', 'required'),
			array('tour, season_year', 'numerical', 'integerOnly'=>true),
			array('id, tour, season_year, date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'resultCalendar'=>array(self::HAS_MANY, 'ResultsCalendar','calendar_id'),
            'seasonYear'=>array(self::BELONGS_TO,'SeasonYear','season_year'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tour' => 'Тур',
			'season_year' => 'Сезон',
			'date' => 'Дата',
            'shedule'=>'Расписание',
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
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('tour',$this->tour);
		$criteria->compare('season_year',$this->season_year);
		$criteria->compare('date',$this->date,true);
        $criteria->order = 'tour ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>34,
            )
		));
	}


    protected function afterDelete()
    {
        parent::afterDelete();
        ResultsCalendar::model()->deleteAll(array(
                                             'condition'=>'calendar_id=:calendar_id',
                                             'params'=>array(':calendar_id'=>$this->id),
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Calendar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
