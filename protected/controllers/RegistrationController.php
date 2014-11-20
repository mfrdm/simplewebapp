<?php

/**
 * RegistrationController class file.
 * This is the controller class for user registration action.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class RegistrationController extends Controller
{
	public $defaultAction = 'registration';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	/**
	 * Registration user
	 */
	public function actionRegistration() {
            $model = new RegistrationForm;            
            
			if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			
		    if (Yii::app()->user->id) {
		    	$this->redirect(UserIdentity::getDefaultLoginHomeUrl());
		    } else {
		    	if(isset($_POST['RegistrationForm'])) {
					$model->attributes=$_POST['RegistrationForm'];
					if($model->validate())
					{
						$soucePassword = $model->password;
						$model->activkey=hash('md5',microtime().$model->password);
						$model->password=hash('md5',$model->password);
						$model->verifyPassword=hash('md5',$model->verifyPassword);
						$model->superuser=0;
						$model->status=((UserIdentity::ACTIVE_AFTER_REGISTRATION)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);
						
						if ($model->save()) {
							if (UserIdentity::SEND_ACTIVATION_MAIL) {
								$activation_url = $this->createAbsoluteUrl('/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
								User::sendMail($model->email,Yii::t('app',"You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),Yii::t('app',"Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url)));
							}
							
							if ((UserIdentity::LOGIN_NOT_ACTIVE||(UserIdentity::ACTIVE_AFTER_REGISTRATION && UserIdentity::SEND_ACTIVATION_MAIL==false)) && UserIdentity::AUTO_LOGIN) {
									$identity=new UserIdentity($model->username,$soucePassword);
									$identity->authenticate();
									Yii::app()->user->login($identity,0);
									$this->redirect(UserIdentity::getDefaultLoginHomeUrl());
							} else {
								if (!UserIdentity::ACTIVE_AFTER_REGISTRATION && !UserIdentity::SEND_ACTIVATION_MAIL) {
									Yii::app()->user->setFlash('registration',Yii::t('app',"Thank you for your registration. Contact Admin to activate your account."));
								} elseif(UserIdentity::ACTIVE_AFTER_REGISTRATION && UserIdentity::SEND_ACTIVATION_MAIL ==false) {
									Yii::app()->user->setFlash('registration',Yii::t('app',"Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link('Login',UserIdentity::getLoginUrl()))));
								} elseif(UserIdentity::LOGIN_NOT_ACTIVE) {
									Yii::app()->user->setFlash('registration',Yii::t('app',"Thank you for your registration. Please check your email or login."));
								} else {
									Yii::app()->user->setFlash('registration',Yii::t('app',"Thank you for your registration. Please check your email."));
								}
								$this->refresh();
							}
						}
					}
				}
			    $this->render('/user/registration',array('model'=>$model,));
		    }
	}
}