<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Portal da Transparência (alternativo)',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'defaultController'=>'servidor',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'db'=>array(
			 'connectionString' => 'm', 
			 //'emulatePrepare' => true, 
			 'username' => '', 
			 'password' => '', 
			 //'charset' => 'utf8',
		),
		'format'=>array(
			'numberFormat' => array(
				'decimals'=>2,
				'decimalSeparator'=>',',
				'thousandSeparator'=>'.',
			)
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'servidor/error',
        ),
        'urlManager'=>array(
        	'showScriptName' => false,
        	'urlFormat'=>'path',
        	'rules'=>array(
        		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
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

);
