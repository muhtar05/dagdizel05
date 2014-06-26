<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property integer $user_id
 * @property integer $browsing
 */
class Post extends CActiveRecord
{
    const STATUS_DRAFT=1;
    const STATUS_PUBLISHED=2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('id, title, text, date, user_id', 'safe', 'on'=>'search'),
		);
	}

    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'date',
                'updateAttribute'=>null,
            )
        );
    }


    /**
     * Adds a new comment to this post.
     * This method will set status and post_id of the comment accordingly.
     * @param Comment the comment to be added
     * @return boolean whether the comment is saved successfully
     */
    public function addComment(Comment $comment)
    {
        $comment->status=Comment::STATUS_PENDING;
        $comment->post_id=$this->id;
        $user = (Yii::app()->user->id)? Yii::app()->user->id : 0;

        $comment->status = ($user>0) ? Comment::STATUS_APPROVED : Comment::STATUS_PENDING;

        $comment->user_id = $user;

        if ($comment->parent_id == 0)
        {
            $result = $comment->saveNode();
        }
        else
        {
            $parentNode = Comment::model()->findByPk($comment->parent_id);
            $result = $comment->appendTo($parentNode);
        }

        return $result;
    }



	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'comments' => array(self::HAS_MANY, 'Comment', 'post_id', 'condition'=>'comments.status='.Comment::STATUS_APPROVED, 'order'=>'comments.root, comments.lft,comments.create_date DESC'),
            'commentCount' => array(self::STAT, 'Comment', 'post_id', 'condition'=>'status='.Comment::STATUS_APPROVED),
            'author'=>array(self::BELONGS_TO,'User','user_id'),
            'commentsAll'=>array(self::HAS_MANY,'Comment','post_id'),
		);
	}


    /**
     * This is invoked before the record is saved.
     * @return boolean whether the record should be saved.
     */
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $purifier = new CHtmlPurifier();
            $this->text = $purifier->purify($this->text);
            if($this->isNewRecord)
                $this->user_id=Yii::app()->user->id;

            return true;
        }
        else
            return false;
    }


    protected function afterDelete()
    {
        parent::afterDelete();
        foreach ($this->commentsAll as $comment) {
            $comment->deleteNode();
        }
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'text' => 'Текст',
			'date' => 'Дата создания',
			'user_id' => 'Пользователь',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(

				'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



    public function countPostRating()
    {
        $count = PostRating::model()->count('post_id=:post_id',array(':post_id'=>$this->id));
        return $count;
    }
}
