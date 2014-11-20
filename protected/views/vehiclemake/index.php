<?php
/* @var $this VehiclemakeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Vehicle Make/Manufacture',
);

$this->menu=array(
	array('label'=>'Create Vehicle Make/Manufacture','url'=>array('create')),
);
if(!Yii::app()->user->isGuest){
	$this->menu[] = array('label'=>'Manage Vehiclemake','url'=>array('admin'));
}
?>

<h3>Vehicle Make/Manufacture</h3>

<?php
$this->widget('ext.TbCustomListView', array(
	'id'=>'vehicle_make',
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
	'template'=>"{items}\n<div class=\"row-fluid\"><div class=\"span12\">{pager}</div></div><div class=\"row-fluid\"><div class=\"span12\">{summary}</div></div>",
    'columns' => 4
));
?>