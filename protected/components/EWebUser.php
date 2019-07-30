<?php

/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 23/07/16
 * Time: 6:41
 */
class EWebUser extends CWebUser
{
    public function init()
    {
        parent::init();
    }

    public function isAdmin()
	{
		return $this->checkAccess(UserRoles::ROLE_ADMIN);
	}
	
	public function isKlinik()
	{
		return $this->checkAccess(UserRoles::ROLE_KLINIK);
	}

    public function isDinkes()
    {
        return $this->checkAccess(UserRoles::ROLE_DINKES);
    }
	
	public function isSudin()
	{
		return $this->checkAccess(UserRoles::ROLE_SUDIN);
	}

	public function isPendamping() {
        return $this->checkAccess(UserRoles::ROLE_PENDAMPING);
    }
}