<?php
/* @var $this VehiclemakeController */
/* @var $model Vehiclemake */
?>

<?php
$this->breadcrumbs=array(
	'Vehicle Make/Manufacture'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vehicle Make/Manufacture', 'url'=>array('index')),
	array('label'=>'Create Vehicle Make/Manufacture', 'url'=>array('create')),
	array('label'=>'View Vehicle Make/Manufacture', 'url'=>array('view', 'id'=>$model->id)),
);
if(!Yii::app()->user->isGuest){	
	$this->menu[] = array('label'=>'Manage Vehicle Make/Manufacture','url'=>array('admin'));
}
?>

<h3>Update Vehicle Make/Manufacture <?php echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>