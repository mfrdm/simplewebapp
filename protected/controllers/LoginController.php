<?php

/**
 * LoginController class file.
 * This is the controller class for login and logout action.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class LoginController extends Controller
{
	public $defaultAction = 'login';

	public function actionLogin()
	{

		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;

			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				if($model->validate()) {
					$this->lastViset();
					if (Yii::app()->user->returnUrl=='/index.php')
						$this->redirect(UserIdentity::getDefaultLoginHomeUrl());
					else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(UserIdentity::getDefaultLoginHomeUrl());
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('/login'));
	}

	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

	public function actionRecovery () {
		$form = new UserRecoveryForm;
		if (Yii::app()->user->id) {
		    	$this->redirect(UserIdentity::getDefaultLoginHomeUrl());
		    } else {
				$email = ((isset($_GET['email']))?$_GET['email']:'');
				$activkey = ((isset($_GET['activkey']))?$_GET['activkey']:'');
				if ($email&&$activkey) {
					$form2 = new UserChangePassword;
		    		$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
		    		if(isset($find)&&$find->activkey==$activkey) {
			    		if(isset($_POST['UserChangePassword'])) {
							$form2->attributes=$_POST['UserChangePassword'];
							if($form2->validate()) {
								$find->password = hash('md5',$form2->password);
								$find->activkey= hash('md5',microtime().$form2->password);
								if ($find->status==0) {
									$find->status = 1;
								}
								$find->save();
								Yii::app()->user->setFlash('recoveryMessage',"New password is saved.");
								$this->redirect(UserIdentity::getRecoveryUrl());
							}
						} 
						$this->render('/user/changepassword',array('form'=>$form2));
		    		} else {
		    			Yii::app()->user->setFlash('recoveryMessage',"Incorrect recovery link.");
						$this->redirect(UserIdentity::getRecoveryUrl());
		    		}
		    	} else {
			    	if(isset($_POST['UserRecoveryForm'])) {
			    		$form->attributes=$_POST['UserRecoveryForm'];
			    		if($form->validate()) {
			    			$user = User::model()->notsafe()->findbyPk($form->user_id);
							$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl(implode(UserIdentity::getRecoveryUrl()),array("activkey" => $user->activkey, "email" => $user->email));
							
							$subject = Yii::t('app',"You have requested the password recovery site {site_name}",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    					));
			    			$message = Yii::t('app',"You have requested the password recovery site {site_name}. To receive a new password, go to {activation_url}.",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    						'{activation_url}'=>$activation_url,
			    					));
							
			    			User::sendMail($user->email,$subject,$message);
			    			
							Yii::app()->user->setFlash('recoveryMessage',"Please check your email. An instructions was sent to your email address.");
			    			$this->refresh();
			    		}
			    	}
		    		$this->render('/user/recovery',array('form'=>$form));
		    	}
		    }
	}	

	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = hash('md5',$model->password);
						$new_password->activkey=hash('md5',microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',"New password is saved.");
					}
			}
			$this->render('/user/changepasswordprofil',array('model'=>$model));
	    }
	}
}