<?php
/* @var $this VehiclemakeController */
/* @var $model Vehiclemake */


$this->breadcrumbs=array(
	'Vehicle Make/Manufacture'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vehicle Make/Manufacture', 'url'=>array('index')),
	array('label'=>'Create Vehicle Make/Manufacture', 'url'=>array('create')),
);

?>

<h3>Manage Vehicle Make/Manufacture</h3>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'vehiclemake-grid',
	'type' => TbHtml::GRID_TYPE_CONDENSED.' '.TbHtml::GRID_TYPE_HOVER.' '.TbHtml::GRID_TYPE_BORDERED.' '.TbHtml::GRID_TYPE_STRIPED,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>