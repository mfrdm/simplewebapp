<?php
/* @var $this VehiclemakeController */
/* @var $model Vehiclemake */
?>

<?php
$this->breadcrumbs=array(
	'Vehicle Make/Manufacture'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Vehicle Make/Manufacture', 'url'=>array('index')),
	array('label'=>'Create Vehicle Make/Manufacture', 'url'=>array('create')),
);
if(!Yii::app()->user->isGuest){	
	$this->menu[] = array('label'=>'Update Vehicle Make/Manufacture', 'url'=>array('update', 'id'=>$model->id));
	$this->menu[] = array('label'=>'Delete Vehicle Make/Manufacture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'));
	$this->menu[] = array('label'=>'Manage Vehicle Make/Manufacture','url'=>array('admin'));
}
?>

<h3>View Vehicle Make/Manufacture #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
	),
)); ?>