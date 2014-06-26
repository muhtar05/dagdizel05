<?php

/**
 * This is the model class for table "{{online_match_comment}}".
 *
 * The followings are the available columns in table '{{online_match_comment}}':
 * @property integer $id
 * @property integer $type_comment
 * @property string $minute
 * @property string $text
 * @property string $create_time
 * @property integer $match_id
 */
class OnlineMatchComment extends CActiveRecord
{
    const COMMENT_TYPE_DEFAULT = 1;
    const COMMENT_TYPE_GOAL = 2;
    const COMMENT_TYPE_CHANGE = 3;
    const COMMENT_TYPE_YELLOW_CARD = 4;
    const COMMENT_TYPE_RED_CARD = 5;
    const COMMENT_TYPE_CORNER = 6;
    const COMMENT_TYPE_TIME = 7;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{online_match_comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text', 'required'),
			array('text,minute,type_comment', 'safe'),
			array('id, text, create_time,match_id', 'safe', 'on'=>'search'),
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

    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
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
			'text' => 'Текст',
			'create_time' => 'Create Time',
            'type_comment'=>'Тип',
            'minute'=>'Минута',


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

        $match_id = intval($_GET['id']);

		$criteria->compare('id',$this->id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('create_time',$this->create_time,true);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OnlineMatchComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


//    public function getCommentType()
//    {
//
//        switch($this->type_comment)
//        {
//            case self::COMMENT_TYPE_DEFAULT:
//                $styleProperty = "none";
//                break;
//
//            case self::COMMENT_TYPE_GOAL:
//                $styleProperty = "0 0";
//                break;
//
//            case self::COMMENT_TYPE_CHANGE:
//                $styleProperty = "-20px 0";
//                break;
//
//            case self::COMMENT_TYPE_YELLOW_CARD:
//                $styleProperty = "-35px 0";
//                break;
//
//            case self::COMMENT_TYPE_RED_CARD:
//                $styleProperty = "-60px 0";
//                break;
//
//            case self::COMMENT_TYPE_CORNER:
//                $styleProperty = "-70px 0";
//                break;
//
//            case self::COMMENT_TYPE_TIME:
//                $styleProperty = "-100px 0";
//                break;
//
//
//        }
//        return $styleProperty;
//    }

    public function getCommentType()
    {

        switch($this->type_comment)
        {
            case self::COMMENT_TYPE_DEFAULT:
                $styleProperty = "none";
                break;

            case self::COMMENT_TYPE_GOAL:
                $styleProperty = "<span class='icon-sprite-online goal'></span>";
                break;

            case self::COMMENT_TYPE_CHANGE:
                $styleProperty = "<span class='icon-sprite-online change'></span>";
                break;

            case self::COMMENT_TYPE_YELLOW_CARD:
                $styleProperty = "<span class='icon-sprite-online yellow_card'></span>";
                break;

            case self::COMMENT_TYPE_RED_CARD:
                $styleProperty = "<span class='icon-sprite-online red_card'></span>";
                break;

            case self::COMMENT_TYPE_CORNER:
                $styleProperty = "<span class='icon-sprite-online corner'></span>";
                break;

            case self::COMMENT_TYPE_TIME:
                $styleProperty = "<span class='icon-sprite-online time'></span>";
                break;


        }
        return $styleProperty;
    }


    public function getColorType()
    {
        switch($this->type_comment)
        {
            case self::COMMENT_TYPE_DEFAULT:
                $styleProperty = '';
                break;

            case self::COMMENT_TYPE_GOAL:
                $styleProperty = "goal-online-comment-item";
                break;
            case self::COMMENT_TYPE_YELLOW_CARD:
                $styleProperty = "yellow-online-comment-item";
                break;

            case self::COMMENT_TYPE_RED_CARD:
                $styleProperty = "red-online-comment-item";
                break;
        }

        return $styleProperty;
    }



}
