<?php

/**
 * UserChangePassword class file.
 * UserChangePassword is the data structure for keeping user change password form data.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class UserChangePassword extends CFormModel {
	public $oldPassword;
	public $password;
	public $verifyPassword;
	
	/**
	 * @return array validation rules for model attributes.
	 */	
	public function rules() {
		return Yii::app()->controller->id == 'recovery' ? array(
			array('password, verifyPassword', 'required'),
			array('password, verifyPassword', 'length', 'max'=>128, 'min' => 6,'message' => "Short passwords are easy to guess. Try one with at least 6 characters."),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "These passwords don't match. Try again?"),
		) : array(
			array('oldPassword, password, verifyPassword', 'required'),
			array('oldPassword, password, verifyPassword', 'length', 'max'=>128, 'min' => 6,'message' => "Short passwords are easy to guess. Try one with at least 6 characters."),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "These passwords don't match. Try again?"),
			array('oldPassword', 'verifyOldPassword'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'oldPassword'=>"Old Password",
			'password'=>"New Password",
			'verifyPassword'=>"Confirm a password",
		);
	}
	
	/**
	 * Verify Old Password
	 */
	 public function verifyOldPassword($attribute, $params)
	 {
		 if (User::model()->notsafe()->findByPk(Yii::app()->user->id)->password != hash('md5',$this->$attribute))
			 $this->addError($attribute, "Old Password is incorrect.");
	 }
}