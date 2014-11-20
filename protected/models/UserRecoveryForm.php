<?php

/**
 * UserRecoveryForm class file.
 * UserRecoveryForm is the data structure for keeping user recovery form data.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class UserRecoveryForm extends CFormModel {
	public $login_or_email, $user_id;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('login_or_email', 'required'),
			array('login_or_email', 'match', 'pattern' => '/^[A-Za-z0-9@.-\s,]+$/u','message' => "Incorrect characters (A-z0-9_)."),			
			array('login_or_email', 'checkexists'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'login_or_email'=>"Username or Email",
		);
	}
	
	public function checkexists($attribute,$params) {
		if(!$this->hasErrors())
		{
			if (strpos($this->login_or_email,"@")) {
				$user=User::model()->findByAttributes(array('email'=>$this->login_or_email));
				if ($user)
					$this->user_id=$user->id;
			} else {
				$user=User::model()->findByAttributes(array('username'=>$this->login_or_email));
				if ($user)
					$this->user_id=$user->id;
			}
			
			if($user===null)
				if (strpos($this->login_or_email,"@")) {
					$this->addError("login_or_email","Email is incorrect.");
				} else {
					$this->addError("login_or_email","Username is incorrect.");
				}
		}
	}
	
}