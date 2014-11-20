<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Create Vehicle', 'url'=>array('create')),
	array('label'=>'Update Vehicle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vehicle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);
?>

<h3>View Vehicle #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		array(
			'name'=>'id_make_name',
			'value'=>$model->idMake->name,
		),	
		'model',
		'type',
		'engine_type_displacement',
		'transmission',
		'fuell_supply_system',
		'doors',
		'seets',
		array(
			'name'=>'wheelchair_accessible',
			'value'=>Vehicle::getStatus($model->wheelchair_accessible),
		),	
	),
)); ?>