<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9 ]>   <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<!-- html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" -->
<head>
	<meta charset="utf-8">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="author" content="farid,frdon.net,farid.muh19@yahoo.com">
	<meta name="keywords" content="techgrid">			
	<meta name="description" content="Techgrid Challenge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="language" content="en" />

	<?php Yii::app()->bootstrap->register(); ?>
	<?php
		$baseurl=Yii::app()->request->baseUrl;
    	$cs = Yii::app()->getClientScript();
    	$cs->registerCssFile($baseurl.'/css/style.css');
    	//$cs->registerCssFile($baseurl.'/css/style/theme-responsive-767.css');
    	//$cs->registerCssFile($baseurl.'/css/style/theme-responsive-768-979.css');
    	//$cs->registerCssFile($baseurl.'/css/style/font-awesome-4/css/font-awesome.min.css');
  	?>
</head>

<body>

<?php 

$items = array(
                array('label' => 'Home', 'url' => array('/site/index')),
                array('label' => 'Vehicle', 'url' => array('/vehicle')),
                array('label' => 'Vehicle Make/Manufacture', 'url' => array('/vehiclemake')),
            );
if(User::isAdmin()){
	$items[] = array('label' => 'User', 'url' => array('/user'));
}

$this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => Yii::app()->name,
    'display' => null, // default is static to top
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => $items,
        ),
		array(
            'class'=>'bootstrap.widgets.TbNav',
            'encodeLabel'=>false,
        	'htmlOptions'=>array('class'=>'pull-right'),
        	'items'=>array(   
        	    array('label'=>'&nbsp;&nbsp;Register', 'url'=>array('/registration'), 'visible'=>Yii::app()->user->isGuest),   		        	      		
        		array('label'=>'<i class="icon-user icon-white"></i>&nbsp;&nbsp;Login', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest),
        		array('label'=>'<i class="icon-user icon-white"></i>&nbsp;&nbsp;Logout ('.Yii::app()->user->name.')', 'url'=>array('/login/logout'), 'visible'=>!Yii::app()->user->isGuest),
        		array('label'=>'Change Password', 'url'=>array('/login/changepassword'), 'visible'=>!Yii::app()->user->isGuest),        		
        		),
            ),        
    ),
)); ?>	

<div class="wrapper">
	<div class="container">
		<div class="row">
				<?php echo $content; ?>									
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->			

<footer class="footer">
	<div class="container">		
		Copyright <b>&copy; <?php echo date('Y'); ?></b> by Farid. All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
</footer>

</body>
</html>
