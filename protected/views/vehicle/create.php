<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);
?>

<h3>Create Vehicle</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>