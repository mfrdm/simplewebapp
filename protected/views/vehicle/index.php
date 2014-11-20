<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Vehicles',
);

$this->menu=array(
	array('label'=>'Create Vehicle','url'=>array('create')),
	array('label'=>'Manage Vehicle','url'=>array('admin')),
);
?>

<h3>Vehicles</h3>

<?php
$this->widget('ext.TbCustomListView', array(
	'id'=>'vehicle',
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
	'template'=>"{items}\n<div class=\"row-fluid\"><div class=\"span12\">{pager}</div></div><div class=\"row-fluid\"><div class=\"span12\">{summary}</div></div>",
    'columns' => 2
));
?>