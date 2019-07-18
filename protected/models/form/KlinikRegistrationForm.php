<?php
/**
 * Class KlinikRegistrationForm
 */

class KlinikRegistrationForm extends CFormModel
{
    public $email;
    public $username;
    public $password;
    public $nama_klinik;
    public $penanggung_jawab;
    public $verifyCode;


    public function rules()
    {
        return array(
            array('email, username, password, penanggung_jawab, nama_klinik', 'required'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Save data users
     * @throws CException
     */
    public function save() {
        if ($this->validate()) {
            $user = new Users();
            $user->email = $this->email;
            $user->username = $this->username;
            $user->name = $this->penanggung_jawab;
            $user->user_create = $this->username;
            $user->timestamp_created = new CDbExpression('NOW()');
            $user->password = CPasswordHelper::hashPassword($this->password);
            $user->salt = CPasswordHelper::generateSalt();
            $user->status = Users::STATUS_ACTIVE;
            $user->flag_delete = Users::FLAG_DELETE_INACTIVE;
            if ($user->save()) {
                $auth = Yii::app()->authManager;
                //assign role klinik for this user
                $auth->assign(UserRoles::ROLE_KLINIK, $user->id);

                //tambah data klinik
                $klinik = new Klinik();
                $klinik->id_user = $user->id;
                $klinik->nama = $this->nama_klinik;
                $klinik->penanggung_jawab = $this->penanggung_jawab;
                $klinik->created_at = new CDbExpression('NOW()');
                $klinik->created_by = $this->username;
                return $klinik->save();
            }
        }
    }
}