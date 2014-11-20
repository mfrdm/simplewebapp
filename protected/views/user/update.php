<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	'Update',
);
$this->menu=array(
    array('label'=>'Create User', 'url'=>array('create')),
    array('label'=>'View User', 'url'=>array('view','id'=>$model->id)),
    array('label'=>'Manage Users', 'url'=>array('admin')),
    array('label'=>'List User', 'url'=>array('index')),
);
?>

<h3><?php echo 'Update User '.$model->id; ?></h3>

<?php
	echo $this->renderPartial('_form', array('model'=>$model));
?>