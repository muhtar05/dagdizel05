<?php

/**
 * This is the model class for table "{{season_year}}".
 *
 * The followings are the available columns in table '{{season_year}}':
 * @property integer $id
 * @property string $name
 * @property integer $current
 */
class SeasonYear extends CActiveRecord
{

    const SEASON_YEAR_CURRENT_NONE = 1;
    const SEASON_YEAR_CURRENT_ACTIVE = 2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{season_year}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>255),
            array('current, name', 'safe'),
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),

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
			'name' => 'Название',
            'current'=>'Текущий сезон',
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
        $criteria->compare('current',$this->current);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SeasonYear the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
