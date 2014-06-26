<?php
Yii::import('guest.models.*');

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $fio
 * @property string $password
 * @property string $email
 * @property integer $roleId
 * @property string $ip_address
 * @property string $last_visit
 * @property string $registration_date
 * @property integer $ban
 */
class User extends CActiveRecord
{
    const ADMIN = 1;
    const MODERATOR = 2;
    const USER = 3;
    const USER_ACTIVE = 1;
    const USER_BANNED = 2;

    public $oldPassword;


    /**
     * @param string $_role
     * @return array
     */
    public function getUsersAccessArrayByRole($_role = "*")
    {
        if ($_role != "*")
        {
            $criteria = new CDbCriteria;
            if (is_array($_role))
            {
               for($i =0; $i< count($_role); $i++) {
                   $criteria->addCondition('roleId='.intval($_role[$i]), 'OR');
               }
               $res = $this->findAll($criteria);
            }
            else {
                $res = $this->findAll(array('condition'=>'roleId=:roleId','params'=>array(':roleId'=>$_role)));
            }
        }
        else {
            $res = $this->findAll();
        }

        $array = array();
        foreach($res as $user)
        {
            $array[] = $user->username;
        }
        return !empty($array) ? $array : array('user');
    }

    /**
     * Функция получает массив администраторов.
     * Данные массив будет поставлен в Контроллеры
     *
     * @return <array>
     */
    public function getUsersArray() {
        $res = $this->findAll(array('condition' => 'roleId = 1'));
        $array = array();
        foreach ($res as $user) {
            $array[] = $user->Username;
        }
        return (empty($array) ? array('admin') : $array );
    }

    /**
     * Функция выбирает всех пользователей с БД
     * @return <array>
     */
    public function allUsers() {
        $res = $this->findAll();
        $array = array();
        foreach ($res as $user) {
            $array[] = $user->Username;
        }
        return (empty($array) ? array('admin') : $array );
    }


    /**
     * Функция получает массив модераторов.
     * Данные массив будет поставлен в Контроллеры
     *
     * @return <array>
     */
    public function getModerators() {
        $res = $this->findAll(array('condition' => 'roleId ='.self::MODERATOR));
        $array = array();
        foreach ($res as $user) {
            $array[] = $user->Username;
        }
        return (empty($array) ? array('admin') : $array );
    }

    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            $array = $this->getAttributes(array('password'));
            $password = $array['password'];
            if($this->isNewRecord)
               $this->setAttribute('password', md5($password));
            else
               $this->setAttribute('password',$password);
            return true;
        } else
            return false;
    }



    protected function beforeValidate()
    {
        if ($this->isNewRecord) {
            $user = $this->findAll('LOWER(email)=:email', array(':email' => strtolower($this->email)));
            if ($user != null) {
                $this->addError('email', "Пользователь с email " . $this->email . " уже присутсвует. Выберите другой \"email\"");
                return false;
            }
        }
        return true;
    }


    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('username, password, email', 'required'),
			array('roleId, ban', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>60),
			array('fio', 'length', 'max'=>255),
			array('password', 'length', 'max'=>150),
            array('username,email','unique'),
			array('email', 'length', 'max'=>100),
			array('ip_address', 'length', 'max'=>200),
            array('username, fio, password, email, roleId, ip_address, last_visit, registration_date, ban', 'safe'),
			array('id, username, fio, password, email, roleId, ip_address, last_visit, registration_date, ban', 'safe', 'on'=>'search'),
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
            'comments'=>array(self::HAS_MANY,'Comment','user_id'),
            'commentsCount'=>array(self::STAT,'Comment','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Ник',
			'fio' => 'Фио',
			'password' => 'Password',
			'email' => 'Email',
			'roleId' => 'Роль пользователя',
			'ip_address' => 'Ip Address',
			'last_visit' => 'Last Visit',
			'registration_date' => 'Registration Date',
			'ban' => 'Бан',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('roleId',$this->roleId);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('last_visit',$this->last_visit,true);
		$criteria->compare('registration_date',$this->registration_date,true);
		$criteria->compare('ban',$this->ban);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function createAccount($username,$email,$password)
    {
        $this->setAttributes(array(
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'ip_address'=>Yii::app()->request->userHostAddress,
                'roleId'=>self::USER,
                'ban'=>self::USER_ACTIVE,
        ));

        $this->save();

    }

    /**
     * @return string
     */
    public function getRoleName()
    {
        $roleName = '';
        switch($this->roleId)
        {
            case self::USER:
                $roleName = 'Пользователь';
                break;

            case self::ADMIN:
                $roleName = 'Администратор';
                break;

            case self::MODERATOR:
                $roleName = 'Модератор';
                break;

        }

        return $roleName;
    }
}
