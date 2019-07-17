<?php

/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 3/16/16
 * Time: 21:12
 */
class UserAddForm extends CFormModel
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $passwordConfirm;
    public $data;
    public $isNewRecord=true;

    public function rules()
    {
        return array(
            array('name, username, email, password, passwordConfirm', 'required'),
            array('passwordConfirm', 'compare', 'compareAttribute'=>'password')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name'=>'Nama Lengkap',
            'username'=>'Username',
            'email'=>'Alamat Email',
            'password'=>'Password',
            'passwordConfirm'=>'Konfirmasi Password'
        );
    }

    public function save()
    {
        if($this->validate())
        {
            $model = new Users();
            $model->attributes = $this->attributes;
            $model->user_create = 'admin';
            $model->timestamp_created = new CDbExpression('NOW()');
            $model->password = CPasswordHelper::hashPassword($this->password);
            $model->salt = CPasswordHelper::generateSalt();
            $model->status = Users::STATUS_ACTIVE;
            $model->flag_delete = Users::FLAG_DELETE_INACTIVE;
            if($model->save())
            {
                $this->data = $model;
                return true;
            }
            else
            {
                $this->addErrors($model->getErrors());
                return false;
            }
        }
    }
}