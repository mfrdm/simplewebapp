<?php 
	$this->pageTitle=Yii::app()->name . ' - Registration';
	$this->breadcrumbs=array(
		"Registration",
	);
?>

<h3><?php echo "Registration"; ?></h3>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<?php
echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('registration'));
?>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('CustomActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
	
	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldControlGroup($model, 'username'); ?>
	<?php echo $form->passwordFieldControlGroup($model, 'password',array('help' => 'Minimal password length 6 characters.')); ?>
	<?php echo $form->passwordFieldControlGroup($model, 'verifyPassword'); ?>
	<?php echo $form->textFieldControlGroup($model, 'email'); ?>
	<div class="rows">	
		<?php $this->widget('CCaptcha'); ?><br>
	</div>
	<?php echo $form->textFieldControlGroup($model, 'verifyCode', array('help'=>'Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.')); ?>
 
	<?php echo TbHtml::formActions(array(
	TbHtml::submitButton('Register', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::resetButton('Reset'), 
	)); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>