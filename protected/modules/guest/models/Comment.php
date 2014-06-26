<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property string $id
 * @property string $text
 * @property integer $post_id
 * @property integer $user_id
 * @property string $create_date
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property integer $status
 */
class Comment extends CActiveRecord
{
    const STATUS_PENDING=1;
    const STATUS_APPROVED=2;

    public $verifyCode;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comment}}';
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
			array('post_id, user_id, level', 'numerical', 'integerOnly'=>true),
			array('text,status,create_date,parent_id', 'safe'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, text, post_id, user_id, create_date', 'safe', 'on'=>'search'),
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
            'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
            'author'=>array(self::BELONGS_TO, 'User','user_id'),
        );
    }


    public function approve()
    {
        $this->status = Comment::STATUS_APPROVED;
        $this->update(array('status'));
    }

    public function findRecentComments($limit=10)
    {
        return $this->with('post')->findAll(array(
            'condition'=>'t.status='.self::STATUS_APPROVED,
            'order'=>'t.create_date DESC',
            'limit'=>$limit,
        ));
    }

    public function behaviors()
    {
        return array(
            'nestedSetBehavior'=>array(
                'class'=>'ext.NestedSetBehavior.NestedSetBehavior',
                'leftAttribute'=>'lft',
                'rightAttribute'=>'rgt',
                'levelAttribute'=>'level',
                'hasManyRoots'=>true,
            ),

            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_date',
                'updateAttribute'=>null,
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
			'text' => 'Текст комментария',
			'post_id' => 'Пост',
			'user_id' => 'Пользователь',
			'create_date' => 'Время создания',
			'root' => 'Root',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
            'verifyCode'=>'Введите символы',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('root',$this->root,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('level',$this->level);
        $criteria->order = 'create_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>100,
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



    public function countCommentRating()
    {
        $count = CommentRating::model()->count('comment_id=:comment_id',array(':comment_id'=>$this->id));
        return $count;
    }


    public function getStatus()
    {
        $status = '';
        switch($this->status)
        {
            case self::STATUS_PENDING:
                $status =  'На модерации';
                break;

            case self::STATUS_APPROVED:
                $status = 'Опубликован';
                break;

            default:
                break;
        }

        return $status;
    }
}
