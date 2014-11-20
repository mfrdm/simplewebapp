<?php

/**
 * UserIdentity class file.
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class UserIdentity extends CUserIdentity
{
	private $_id;
	private static $_defaultLoginHomeUrl = array('/site/index');
	private static $_loginUrl = array("/login");
	private static $_logoutUrl = array("/login/logout");
	private static $_recoveryUrl = array("/login/recovery");
	private static $_registrationUrl = array("/registration");

	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIV=4;
	const ERROR_STATUS_BAN=5;
	const REMEMBER_ME_TIME=2592000; // 30 days
	const LOGIN_NOT_ACTIVE=false; // allow auth for is not active user
	const SEND_ACTIVATION_MAIL=true; // use email for activation user account
	const ACTIVE_AFTER_REGISTRATION=false; // activate user on registration (only SEND_ACTIVATION_MAIL = false)
	const AUTO_LOGIN=true; // login after registration (need loginNotActiv or activeAfterRegister = true)

	

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
		if (strpos($this->username,"@")) {
			$user=User::model()->notsafe()->findByAttributes(array('email'=>$this->username));
		} else {
			$user=User::model()->notsafe()->findByAttributes(array('username'=>$this->username));
		}
		if($user===null)
			if (strpos($this->username,"@")) {
				$this->errorCode=self::ERROR_EMAIL_INVALID;
			} else {
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
		else if(hash('md5',$this->password)!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($user->status==0&&self::LOGIN_NOT_ACTIVE==false)
			$this->errorCode=self::ERROR_STATUS_NOTACTIV;
		else if($user->status==-1)
			$this->errorCode=self::ERROR_STATUS_BAN;
		else {
			$this->_id=$user->id;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
    
    /**
    * @return integer the ID of the user record
    */
	public function getId()
	{
		return $this->_id;
	}

	public static function getDefaultLoginHomeUrl(){
		return self::$_defaultLoginHomeUrl;
	}

	public static function getLoginUrl(){
		return self::$_loginUrl;
	}

	public static function getLogoutUrl(){
		return self::$_logoutUrl;
	}	

	public static function getRecoveryUrl(){
		return self::$_recoveryUrl;
	}

	public static function getRegistrationUrl(){
		return self::$_registrationUrl;
	}	
}