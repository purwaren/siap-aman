<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Users::model()->findByUsername($this->username);
		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else
		{
			if (!CPasswordHelper::verifyPassword($this->password, $user->password))
			{
				$user->login_atemp = $user->login_atemp+1;
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}
			else
			{
				$this->_id = $user->id;
				$user->last_login_time = new CDbExpression('NOW()');
				$user->login_atemp = 0;
				$this->errorCode = self::ERROR_NONE;

				//set session variable
				$this->setState('fullname', $user->name);
			}
			$user->last_login_attempt = new CDbExpression('NOW()');
		}
		return !$this->errorCode;
	}

	/**
	 * Retrieve the ID of logged in user
	 * @return mixed
	 */
	public function getId()
	{
		return $this->_id;
	}
}