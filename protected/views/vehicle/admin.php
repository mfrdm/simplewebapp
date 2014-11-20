<?php
/* @var $this VehicleController */
/* @var $model Vehicle */


$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Create Vehicle', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehicle-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Vehicles</h3>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="clearfix"></div><br>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'vehicle-grid',
	'type' => TbHtml::GRID_TYPE_CONDENSED.' '.TbHtml::GRID_TYPE_HOVER.' '.TbHtml::GRID_TYPE_BORDERED.' '.TbHtml::GRID_TYPE_STRIPED,	
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name'=>'id_make_name',
			'value'=>'$data->idMake->name',
		),		
		'model',
		'type',
		'engine_type_displacement',
		'transmission',
		/*
		'fuell_supply_system',
		'doors',
		'seets',
		*/
		array(
			'name'=>'wheelchair_accessible',
			'value'=>'Vehicle::getStatus($data->wheelchair_accessible)',
			'filter'=>Vehicle::getStatuses(),
		),			
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>