<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 20.11.13
 * Time: 23:14
 * To change this template use File | Settings | File Templates.
 */

class RegistrationForm extends CFormModel
{
    public $username;
    public $password;
    public $controlPassword;
    public $email;
    public $userAgreement;


    public function rules()
    {
        return array(
            array('username,email', 'filter','filter'=>'trim'),
            array('username,email,password,controlPassword','required'),
            array( 'userAgreement', 'required', 'requiredValue'=>1,'message'=>'Вы должны принять правила' ),
            array('username','match','pattern'=>'/^[A-Za-z0-9А-Яа-я]{5,50}$/u','message'=>'Логин неправильный'),
            array('email','email'),
            array('controlPassword','compare','compareAttribute'=>'password','message'=>'Пароли не совпадают'),

        );
    }

    public function attributeLabels()
    {
        return array(
            'username'=>'Логин',
            'email'=>'E-mail',
            'password'=>'Пароль',
            'controlPassword'=>'Повторите пароль',
            'userAgreement'=>'Я согласен(а) с  <a id="user-agreement" href="#">правилами</a> пользования',
        );
    }





}