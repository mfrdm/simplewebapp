<?php

/**
 * LoginForm class file.
 * LoginForm is the data structure for keeping user login form data.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class UserLogin extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	/**
	 * @return array validation rules for model attributes.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(			
			array('username, password', 'required'),			
			array('rememberMe', 'boolean'),
			array('password', 'authenticate'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>"Remember me next time",
			'username'=>"Username or Email",
			'password'=>"Password",
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$identity=new UserIdentity($this->username,$this->password);
			$identity->authenticate();
			switch($identity->errorCode)
			{
				case UserIdentity::ERROR_NONE:
					$duration=$this->rememberMe ? UserIdentity::REMEMBER_ME_TIME : 0;
					Yii::app()->user->login($identity,$duration);
					break;
				case UserIdentity::ERROR_EMAIL_INVALID:
					$this->addError("username","Email is incorrect.");
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError("username","Username is incorrect.");
					break;
				case UserIdentity::ERROR_STATUS_NOTACTIV:
					$this->addError("status","You account is not activated.");
					break;
				case UserIdentity::ERROR_STATUS_BAN:
					$this->addError("status","You account is blocked.");
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError("password","Password is incorrect.");
					break;
			}
		}
	}
}
