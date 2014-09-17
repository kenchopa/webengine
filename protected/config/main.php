<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$sessionTimeout = 1200; // 1200 secondes => 20 minutes

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Kenchopa ~Intelligence matters~',
        'theme'=>'kenchopa',
        'sourceLanguage'=>'en',
        'timeZone' => 'Europe/Brussels',
	// preloading 'log' component
	'preload'=>array('log'),
    

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.components.ManyManyActiveRecord',
                //'application.extensions.EAdvancedArBehavior',
                /*'application.modules.auth.*', // AUTH
                'application.modules.auth.components.*',*/
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                /*'auth' => array( // AUTH
                        'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
                        'userClass' => 'User', // the name of the user model class.
                        'userIdColumn' => 'User', // the name of the user id column.
                        'userNameColumn' => 'UserName', // the name of the user name column.
                        'defaultLayout' => 'application.views.layouts.main', // the layout used by the module.
                        'viewDir' => null, // the path to view files to use with this module.
                      ),*/
	),
    
        // Associates a behavior-class with the onBeginRequest event.
        // By placing this within the primary array, it applies to the application as a whole
        'behaviors'=>array(
        'onBeginRequest' => array(
            'class' => 'application.components.behaviors.BeginRequest'
            ),
        ),
        
        'params'=> require(dirname(__FILE__).'/params.php'),
            
	// application components
	'components'=>array(
                'request'=>array(
                    'enableCookieValidation'=>true,
                    'enableCsrfValidation'=>true,
                    'class'=>'HttpRequest',
                        /* routes than won't need csrf validation */
                        'noCsrfValidationRoutes'=>array(
                            'user/delete',
                            'country/delete',
                            'client/delete',
                        ),
                ),
                'session' => array(
                        'class' => 'CDbHttpSession',
                        'timeout' => $sessionTimeout,
                ),
                 /*'authManager' => array( // AUTH
                    'behaviors' => array(
                      'auth' => array(
                        'class' => 'auth.components.AuthBehavior',
                      ),
                    ),
                  ),*/
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        /*'class' => 'auth.components.AuthWebUser', // AUTH
                        'admins' => array('admin', 'foo', 'bar'), // users with full access*/
                        'class' => 'WebUser',
		),
		// uncomment the following to enable URLs in path-format to access gii gui
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false, /* remove this for gii activation + remove htaccess'*/
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                '~<view:\w+'=>'site/page'
			),
		),
		// uncomment the following to use a MySQL database
                /*
                 * $mysql_host = "mysql15.000webhost.com";
                $mysql_database = "a8374254_store";
                $mysql_user = "a8374254_admin";
                $mysql_password = "azerty123";
                 */
                 /* TEST PRODUCTION */
                /*'db'=>array(
			'connectionString' => 'mysql:host=mysql15.000webhost.com;dbname=a8374254_store',
			'emulatePrepare' => true,
			'username' => 'a8374254_admin',
			'password' => 'azerty123',
			'charset' => 'utf8',
		),*/
                 /* DEVELOPMENT */
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=storehouse',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
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
					'levels'=>'error, warning, info',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
                                        'levels'=>'trace',
                                        'enabled'=>YII_DEBUG,
				),
				
			),
		),
                'sass' => array(
                        // Path to the SassHandler class
                        'class' => 'ext.yii-sass.SassHandler',

                        // Path and filename of scss.inc.php
                        'compilerPath' => dirname(__FILE__) . '/../vendor/scssphp/scss.inc.php',

                        // Path and filename of compass.inc.php
                        // Required only if Compass support is required
                        'compassPath' => dirname(__FILE__) . '/../vendor/scssphp-compass/compass.inc.php',

                        // Enable Compass support, defaults to false
                        'enableCompass' => true,
                ),
	),
);