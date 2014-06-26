<?php

/**
 * This is the model class for table "{{table_result}}".
 *
 * The followings are the available columns in table '{{table_result}}':
 * @property integer $id
 * @property string $name
 * @property string $team_1
 * @property string $team_2
 * @property string $team_3
 * @property string $team_4
 * @property string $team_5
 * @property string $team_6
 * @property string $team_7
 * @property string $team_8
 * @property string $team_9
 * @property string $team_10
 * @property string $team_11
 * @property string $team_12
 * @property string $team_13
 * @property string $team_14
 * @property string $team_15
 * @property string $team_16
 * @property string $team_17
 * @property string $team_18
 */
class TableResult extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{table_result}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, team_1, team_2, team_3, team_4, team_5, team_6, team_7, team_8, team_9, team_10, team_11, team_12, team_13, team_14, team_15, team_16, team_17, team_18', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, team_1, team_2, team_3, team_4, team_5, team_6, team_7, team_8, team_9, team_10, team_11, team_12, team_13, team_14, team_15, team_16, team_17, team_18', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'team_1' => 'Team 1',
			'team_2' => 'Team 2',
			'team_3' => 'Team 3',
			'team_4' => 'Team 4',
			'team_5' => 'Team 5',
			'team_6' => 'Team 6',
			'team_7' => 'Team 7',
			'team_8' => 'Team 8',
			'team_9' => 'Team 9',
			'team_10' => 'Team 10',
			'team_11' => 'Team 11',
			'team_12' => 'Team 12',
			'team_13' => 'Team 13',
			'team_14' => 'Team 14',
			'team_15' => 'Team 15',
			'team_16' => 'Team 16',
			'team_17' => 'Team 17',
			'team_18' => 'Team 18',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('team_1',$this->team_1,true);
		$criteria->compare('team_2',$this->team_2,true);
		$criteria->compare('team_3',$this->team_3,true);
		$criteria->compare('team_4',$this->team_4,true);
		$criteria->compare('team_5',$this->team_5,true);
		$criteria->compare('team_6',$this->team_6,true);
		$criteria->compare('team_7',$this->team_7,true);
		$criteria->compare('team_8',$this->team_8,true);
		$criteria->compare('team_9',$this->team_9,true);
		$criteria->compare('team_10',$this->team_10,true);
		$criteria->compare('team_11',$this->team_11,true);
		$criteria->compare('team_12',$this->team_12,true);
		$criteria->compare('team_13',$this->team_13,true);
		$criteria->compare('team_14',$this->team_14,true);
		$criteria->compare('team_15',$this->team_15,true);
		$criteria->compare('team_16',$this->team_16,true);
		$criteria->compare('team_17',$this->team_17,true);
		$criteria->compare('team_18',$this->team_18,true);

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
	 * @return TableResult the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
