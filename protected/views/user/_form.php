<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <hr>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model, 'username',array('span'=>5)); ?>
	<?php echo $form->passwordFieldControlGroup($model, 'password',array('span'=>5)); ?>
	<?php echo $form->textFieldControlGroup($model, 'email',array('span'=>5)); ?>
	<?php echo $form->dropDownListControlGroup($model,'superuser',User::itemAlias('AdminStatus')); ?>
	<?php echo $form->dropDownListControlGroup($model,'status',User::itemAlias('UserStatus')); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    //'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->