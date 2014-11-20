<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);

$this->menu=array(
    array('label'=>'Manage Users', 'url'=>array('admin')),
    array('label'=>'List User', 'url'=>array('index')),
);
?>
<h3>Create User</h3>

<?php
	echo $this->renderPartial('_form', array('model'=>$model));
?>