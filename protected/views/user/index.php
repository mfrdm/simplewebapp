<?php
$this->breadcrumbs=array(
	"Users",
);
if(User::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
	    array('label'=>'Manage Users', 'url'=>array('admin')),
	);
}
?>

<h3>List User</h3>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'dataProvider'=>$dataProvider,
	'type' => TbHtml::GRID_TYPE_CONDENSED.' '.TbHtml::GRID_TYPE_HOVER.' '.TbHtml::GRID_TYPE_BORDERED.' '.TbHtml::GRID_TYPE_STRIPED,		

	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		'create_at',
		'lastvisit_at',
	),
)); ?>
