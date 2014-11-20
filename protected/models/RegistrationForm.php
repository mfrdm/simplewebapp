<?php

/**
 * RegistrationForm class file.
 * RegistrationForm is the data structure for keeping user registration form data. 
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class RegistrationForm extends User {
	public $verifyPassword;
	public $verifyCode;
	
	public function rules() {
		$rules = array(
			array('username, password, verifyPassword, email', 'required'),
			array('username', 'length', 'max'=>30, 'min' => 6,'message' => "Please use between 6 and 30 characters."),
			array('password', 'length', 'max'=>128, 'min' => 6,'message' => "Short passwords are easy to guess. Try one with at least 6 characters."),
			array('email', 'email'),
			array('username', 'unique', 'message' => "Someone already has that username. Try another?"),
			array('email', 'unique', 'message' => "This user's email address already exists."),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => "Incorrect characters (A-z0-9_)."),
		);
		if (!(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')) {
			
		}
		array_push($rules,array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => "These passwords don't match. Try again?"));
		return $rules;
	}
	
}