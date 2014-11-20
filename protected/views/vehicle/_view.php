<?php
/* @var $this VehicleController */
/* @var $data Vehicle */
?>

<div class="view_vehicle">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_make')); ?>:</b>
	<?php echo CHtml::encode($data->idMake->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_type_displacement')); ?>:</b>
	<?php echo CHtml::encode($data->engine_type_displacement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transmission')); ?>:</b>
	<?php echo CHtml::encode($data->transmission); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuell_supply_system')); ?>:</b>
	<?php echo CHtml::encode($data->fuell_supply_system); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('doors')); ?>:</b>
	<?php echo CHtml::encode($data->doors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seets')); ?>:</b>
	<?php echo CHtml::encode($data->seets); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wheelchair_accessible')); ?>:</b>
	<?php echo Vehicle::getStatus($data->wheelchair_accessible); ?>
	<br />

</div>