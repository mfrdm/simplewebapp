<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Create Vehicle', 'url'=>array('create')),
	array('label'=>'View Vehicle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);
?>

    <h3>Update Vehicle <?php echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>