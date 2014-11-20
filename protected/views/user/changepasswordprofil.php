<?php $this->pageTitle=Yii::app()->name . ' - Change Password';
$this->breadcrumbs=array(
	"Change Password",
);

?>


				<div class="form">
				<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id'=>'changepassword-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					'enableAjaxValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>

					<p class="note"><?php echo 'Fields with <span class="required">*</span> are required.'; ?></p>
					<?php echo $form->errorSummary($model); ?>
					
					<?php echo $form->passwordFieldControlGroup($model,'oldPassword',array('span'=>5,'maxlength'=>100)); ?>

					<?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>100,'help' => 'Minimal password length 6 characters.')); ?>
					<?php echo $form->passwordFieldControlGroup($model,'verifyPassword',array('span'=>5,'maxlength'=>100)); ?>

				        <?php echo TbHtml::submitButton('Simpan',array(
						    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
						    //'size'=>TbHtml::BUTTON_SIZE_LARGE,
						)); ?>
				<?php $this->endWidget(); ?>
				</div><!-- form -->


