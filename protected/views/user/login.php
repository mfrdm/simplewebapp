<?php
	$this->pageTitle=Yii::app()->name . ' - Login';
	$this->breadcrumbs=array(
		"Login",
	);
?>

<h3>Login</h3>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
<?php
echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('loginMessage'));
?>
<?php endif; ?>

<p><?php echo "Please fill out the following form with your login credentials:"; ?></p>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldControlGroup($model, 'username'); ?>
	<?php echo $form->passwordFieldControlGroup($model, 'password'); ?>
	<div class="rows">
		<p class="hint">
			<?php echo CHtml::link("Register",UserIdentity::getRegistrationUrl()); ?> | <?php echo CHtml::link("Lost Password?",UserIdentity::getRecoveryUrl()); ?>
		</p>
	</div>

	<?php echo $form->checkBoxControlGroup($model,'rememberMe'); ?>


	
	<?php echo TbHtml::submitButton('Login', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)) ?>
	
	
<?php $this->endWidget(); ?>
</div><!-- form -->


