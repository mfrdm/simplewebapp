<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'vehicle-form',
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <hr>
    <?php echo $form->errorSummary($model); ?>

            <?php echo '<div class="control-group">'; ?>
            <?php echo CHtml::ActiveLabelEx($model,'id_make',array('class'=>'control-label')); ?>
            <?php echo '<div class="controls">'; ?>
            <?php
                $this->widget('yiiwheels.widgets.select2.WhSelect2', array(
                    'asDropDownList' => false,
                    'model' => $model,
                    'attribute' => 'id_make',
                    'pluginOptions' => array(
                        'minimumInputLength' => 1,
                        'width' => '68.4%',
                        'placeholder' => 'Vehicle Make/Manufacture',
                        'ajax' => array( 
                            'url' => CController::createUrl('vehicle/make'),
                            'dataType'=> 'json',
                            'quietMillis' => 100,
                            'data' => 'js:function (term,page) {
                                return {
                                    q: term,
                                    page_limit:10,
                                    page: page,
                                };
                            }',
                            'results' => 'js:function (data,page) { 
                                //return {results: data};
                                var more = (page * 10) < data.total;
                                return {results: data.results, more: more};
                            }'                            
                            ),
                        'initSelection' => 'js:function(element, callback) {
                            var id=$(element).val();
                            if (id!=="") {
                                $.ajax("'.CController::createUrl('vehicle/initmake').'", {
                                    data: {
                                        qid: id
                                    },
                                    dataType: "json"
                                }).done(function(data) {                                     
                                    callback(data); 
                                });
                                }
                            }',
                        ),
                    )

                );
            ?>            
            <?php echo CHtml::error($model,'id_make'); ?>
            <?php echo '</div>'; ?>
            <?php echo '</div>'; ?>

            <?php echo $form->textFieldControlGroup($model,'model',array('span'=>5,'maxlength'=>25)); ?>

            <?php echo $form->textFieldControlGroup($model,'type',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'engine_type_displacement',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'transmission',array('span'=>5,'maxlength'=>25)); ?>

            <?php echo $form->textFieldControlGroup($model,'fuell_supply_system',array('span'=>5,'maxlength'=>20)); ?>

            <?php echo $form->textFieldControlGroup($model,'doors',array('span'=>1)); ?>

            <?php echo $form->textFieldControlGroup($model,'seets',array('span'=>1)); ?>

            <?php echo $form->checkBoxControlGroup($model, 'wheelchair_accessible'); ?>
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    //'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->