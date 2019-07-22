<?php
/**
 * Class CreatePendampingForm
 */

class CreatePendampingForm extends CFormModel
{
    //account info
    public $name;
    public $username;
    public $email;
    public $password;

    //profile info
    public $tipe;
    public $id_sudin;
    public $id;

    public function rules()
    {
        return array(
            array('name, username, email, password, tipe, id_sudin', 'required')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nama Lengkap',
            'tipe' => 'Jenis Pendamping',
            'id_sudin' => 'Suku Dinas'
        );
    }

    /**
     * @throws CException
     */
    public function save() {
        if ($this->validate()) {
            //create user
            $user = new Users();
            $user->attributes = $this->attributes;
            $user->password = CPasswordHelper::hashPassword($this->password);
            $user->salt = CPasswordHelper::generateSalt();
            $user->status = Users::STATUS_ACTIVE;
            $user->flag_delete = Users::FLAG_DELETE_INACTIVE;
            $user->timestamp_created = new CDbExpression('NOW()');
            $user->user_create = Yii::app()->user->getName();

            if ($user->save()) {
                $auth = Yii::app()->authManager;
                //assign role sudin for this user
                $auth->assign(UserRoles::ROLE_SUDIN, $user->id);

                //save data pendamping
                $pendamping = new PendampingCustom();
                $pendamping->id_user = $user->id;
                $pendamping->id_sudin = $this->id_sudin;
                $pendamping->tipe = $this->tipe;
                $pendamping->nama = $this->name;
                $pendamping->email = $this->email;
                $pendamping->created_at = new CDbExpression('NOW()');
                $pendamping->created_by = Yii::app()->user->getName();
                if ($pendamping->save()) {
                    $this->id = $pendamping->id;
                    return true;
                }
            }
        }

    }
}