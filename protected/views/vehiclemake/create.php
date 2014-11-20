<?php
/* @var $this VehiclemakeController */
/* @var $model Vehiclemake */
?>

<?php
$this->breadcrumbs=array(
	'Vehicle Make/Manufacture'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vehicle Make/Manufacture', 'url'=>array('index')),
);
if(!Yii::app()->user->isGuest){	
	$this->menu[] = array('label'=>'Manage Vehicle Make/Manufacture','url'=>array('admin'));
}
?>

<h3>Create Vehicle Make/Manufacture</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>