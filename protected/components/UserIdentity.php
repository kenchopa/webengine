<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        const ERROR_USER_INACTIVE   =67;
        const ERROR_USER_SUSPENDED  =68;
        
        private $_id;
        public $user;
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
        public function authenticate()
        {
                $user = User::model()->findByAttributes(array('UserName' => $this->username));

                if($user===null)
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                else if($user->Suspend != User::SUSPEND_NONE)
                {
                    $this->errorCode=self::ERROR_USER_SUSPENDED;
                }
                else if($user->Active != User::ACTIVATION_ACTIVE)
                {
                    $this->errorCode=self::ERROR_USER_INACTIVE ;
                }
                else if ($user->check($this->password))
                {   
                    $this->_id = $user->User_ID;
                    $this->setUser($user);
                    $this->errorCode=self::ERROR_NONE;
                }
                else
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
                return !$this->errorCode;
        }

        public function getId()
        {
            return $this->_id;
        }
        
        public function getUser()
        {
            return $this->user;
        }
        
        public function setUser(CActiveRecord $user)
        {
            $this->user=$user->attributes;
        }
}