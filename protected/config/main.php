<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Techgrid Challenge',

	// preloading 'log' component
	'preload'=>array('log'),
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),        
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'),
    ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.helpers.TbHtml',		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'farid',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
		
	),

	// application components
	'components'=>array(
		'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),		
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',   
        ),		
		'user'=>array(
			// enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/login'),
		),		
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=db_techgrid',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'dwc',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
			'enableParamLogging' => true,
			'schemaCachingDuration' => 3600,
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);