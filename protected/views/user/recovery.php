<?php $this->pageTitle=Yii::app()->name . ' - Restore';
$this->breadcrumbs=array(
	"Restore",
);
?>

<h3>Restore</h3>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo TbHtml::beginFormTb(); ?>

	<?php echo TbHtml::errorSummary($form); ?>
	

	<?php echo TbHtml::activeTextFieldControlGroup($form,'login_or_email',
        array('label' => 'Username or Email', 'placeholder' => 'Please enter your login or email addres.','class'=>'span4')); ?>

	<?php echo TbHtml::submitButton("Restore",array('color' => TbHtml::BUTTON_COLOR_DEFAULT)); ?>


<?php echo TbHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>