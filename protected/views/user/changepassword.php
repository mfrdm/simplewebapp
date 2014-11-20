<?php $this->pageTitle=Yii::app()->name . ' - Change Password';
$this->breadcrumbs=array(
	"Change Password",
);
?>

<h3>Change Password</h3>


<div class="form">
<?php echo TbHtml::beginFormTb(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo CHtml::errorSummary($form); ?>
	
	<?php echo TbHtml::activePasswordFieldControlGroup($form,'password',
        array('label' => 'New Password', 'placeholder' => 'Minimal password length 6 characters.','class'=>'span4')); ?>
	
	<?php echo TbHtml::activePasswordFieldControlGroup($form,'verifyPassword',
        array('label' => 'Confirm a password','class'=>'span4')); ?>	
	
	
	<?php echo TbHtml::submitButton("Save",array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php echo TbHtml::endForm(); ?>
</div><!-- form -->