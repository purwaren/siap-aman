<?php
/**
 * Created by PhpStorm.
 * User: purwaren
 * Date: 2019-03-09
 * Time: 19:29
 */

class ChangePasswordForm extends CFormModel
{
    public $userid;
    public $old_password;
    public $new_password;
    public $new_password_confirm;

    public function rules()
    {
        return array(
            array('userid, old_password, new_password, new_password_confirm', 'required'),
            array('new_password, new_password_confirm', 'length', 'min'=>6),
            array('new_password_confirm','compare','compareAttribute'=>'new_password'),
            array('old_password', 'valid')
        );
    }

    public function attributeLabels()
    {
        return array(
            'old_password'=>'Password Lama',
            'new_password'=>'Password Baru',
            'new_password_confirm'=>'Konfirmasi Password'
        );
    }

    /**
     * @param $param
     * @param $attribute
     * @throws CException
     */
    public function valid($param, $attribute)
    {
        if(!$this->hasErrors())
        {
            $user = Users::model()->findByPk($this->userid);
            if($user === null)
            {
                $this->addError('old_password', 'Password salah');
            }
            else
            {
                if (!CPasswordHelper::verifyPassword($this->old_password, $user->password)) {
                    $this->addError('old_password', 'Password salah');
                }
            }
        }
    }

    /**
     * @return bool
     * @throws CDbException
     * @throws CException
     */
    public function save() {
        if ($this->validate()) {
            $user = Users::model()->findByPk($this->userid);
            $user->password = CPasswordHelper::hashPassword($this->new_password);
            if ($user->update('password')) {
                return true;
            }
        }
    }
}