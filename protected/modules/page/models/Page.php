<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $parent_id
 * @property string $body
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $pos
 */
class Page extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, slug, parent_id, body', 'required'),
			array('parent_id, pos', 'numerical', 'integerOnly'=>true),
			array('title, slug, seo_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, slug, parent_id, body, seo_title, seo_keywords, seo_description, pos', 'safe', 'on'=>'search'),
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
			'title' => 'Заголовок',
			'slug' => 'Slug',
			'parent_id' => 'Родитель',
			'body' => 'Текст',
			'seo_title' => 'Seo Title',
			'seo_keywords' => 'Seo Keywords',
			'seo_description' => 'Seo Description',
			'pos' => 'Pos',
		);
	}



    protected function beforeValidate()
    {
        $this->slug = CString::translitTo($this->title);
        return parent::beforeValidate();
    }


    protected function afterSave()
    {
        parent::afterSave();
        $path = "";
        if($this->parent_id >0)
        {
           $parentModel = Page::model()->findByPk($this->parent_id);
            $path = $parentModel->slug;
        }
        else {
            $path = "/page";
        }
        $this->updateByPk($this->getPrimaryKey(), array('slug'=> $path.'/'.$this->slug));
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('pos',$this->pos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



    public static function getParentPage()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'parent_id=0';
        $defaultItems = array(0=>'Корневой элемент');
        $parentPage = CHtml::listData(Page::model()->findAll($criteria),'id','title');
        $allMenu = CMap::mergeArray($defaultItems,$parentPage);
        return $allMenu;
    }
}
