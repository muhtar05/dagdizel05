<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $href
 * @property integer $sort
 * @property integer $status
 */
class Menu extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{menu}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_id, title, href', 'required'),
            array('parent_id, sort, status', 'numerical', 'integerOnly' => true),
            array('title, href', 'length', 'max' => 255),
            array('sort','safe'),
            array('id, parent_id, title, href, sort, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'title' => 'Заголовок',
            'href' => 'url',
            'sort' => 'Sort',
            'status' => 'Статус',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('href', $this->href, true);
        $criteria->compare('sort', $this->sort);
        $criteria->compare('status', $this->status);

        $criteria->order = 'sort ASC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public static function getParentMenu()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'parent_id=0';
        $defaultItems = array(0 => 'Корневой элемент');
        $parentMenu = CHtml::listData(Menu::model()->findAll($criteria), 'id', 'title');
        $allMenu = CMap::mergeArray($defaultItems, $parentMenu);
        return $allMenu;
    }


    public static function getUrlsAlias()
    {
        Yii::import('page.models.Page');
        Yii::import('admin.models.Modules');
        $page = CHtml::listData(Page::model()->findAll(), 'slug', 'title');
        $modules = CHtml::listData(Modules::model()->findAll(), 'url', 'name');
        $allUrlAlias = CMap::mergeArray($page, $modules);
        return $allUrlAlias;
    }


    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if ($this->isNewRecord)
            {
                $criteria = new CDbCriteria();
                $criteria->condition = 'parent_id=:parent_id';
                $criteria->params = array(':parent_id' => $this->parent_id);
                $count = Menu::model()->count($criteria);
                $this->sort = $count + 1;

            }
            return true;
        } else {
            return false;
        }
    }


}
