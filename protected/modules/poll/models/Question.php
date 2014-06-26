<?php

/**
 * This is the model class for table "{{question}}".
 *
 * The followings are the available columns in table '{{question}}':
 * @property integer $id
 * @property string $question_text
 * @property string $pub_date
 * @property integer $show
 */
class Question extends CActiveRecord
{

    const SHOW_QUESTION_NO = 1;
    const SHOW_QUESTION_YES = 2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{question}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_text, show', 'required'),
			array('show', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question_text, pub_date, show', 'safe', 'on'=>'search'),
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
            'choice'=>array(self::HAS_MANY,'Choice','question_id'),
		);
	}


    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'pub_date',
                'updateAttribute' => null,

            )
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question_text' => 'Вопрос',
			'pub_date' => 'Дата публикации',
			'show' => 'Отображать',
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
		$criteria->compare('question_text',$this->question_text,true);
		$criteria->compare('pub_date',$this->pub_date,true);
		$criteria->compare('show',$this->show);

        $criteria->with = 'choice';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getChoiceHtml()
    {
        $choice = $this->choice;
        foreach($choice as $ch)
        {
            echo $ch->choice_text.'<br />';
        }
    }
}
