<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->username,
);


$this->menu=array(
    array('label'=>'Create User', 'url'=>array('create')),
    array('label'=>'Update User', 'url'=>array('update','id'=>$model->id)),
    array('label'=>'Delete User', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
    array('label'=>'Manage Users', 'url'=>array('admin')),
    array('label'=>'List User', 'url'=>array('index')),
);
?>
<h3><?php echo 'View User "'.$model->username.'"'; ?></h3>

<?php
 
	$attributes = array(
		'id',
		'username',
		'password',
		'email',
		'activkey',
		'create_at',
		'lastvisit_at',
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)		
	);
	

	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
	    'htmlOptions' => array(
	        'class' => 'table table-striped table-condensed table-hover',
	    ),		
		'attributes'=>$attributes,
	));
	

?>
