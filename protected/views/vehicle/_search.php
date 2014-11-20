<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
/* @var $form CActiveForm */
?>
<br>
<div class="well form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_make_name',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'model',array('span'=>5,'maxlength'=>25)); ?>

                    <?php echo $form->textFieldControlGroup($model,'type',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'engine_type_displacement',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'transmission',array('span'=>5,'maxlength'=>25)); ?>

                    <?php echo $form->textFieldControlGroup($model,'fuell_supply_system',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'doors',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'seets',array('span'=>5)); ?>

                    <?php echo $form->checkBoxControlGroup($model,'wheelchair_accessible',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->