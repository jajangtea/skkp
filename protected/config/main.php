<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SISTEM INFROMASI KP DAN SKRIPSI',
        'timeZone'=>'Asia/Jakarta',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.bootstrap.components.*',
	),

	'modules'=>array(
        //languange
	

		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'0000',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
        'sourceLanguage' =>'id',
        'language' => 'id',
	// application components
	'components'=>array(
                'localtime'=>array(
                    'class'=>'LocalTime',
                ),
		'user'=>array(
			// enable cookie-based authentication
                        'class'=>'application.components.EWebUser',
			'allowAutoLogin'=>true,
		),
                'widgetFactory' => array(
                'widgets' => array(
                    'CLinkPager' => array(
                        'htmlOptions' => array(
                            'class' => 'pagination'
                        ),
                        'header' => false,
                        'maxButtonCount' => 5,
                        'cssFile' => false,
                    ),
                    'CGridView' => array(
                        'htmlOptions' => array(
                            'class' => 'table-responsive'
                        ),
                        'pagerCssClass' => 'dataTables_paginate paging_bootstrap',
                        'itemsCssClass' => 'table table-striped table-hover',
                        'cssFile' => false,
                        'summaryCssClass' => 'dataTables_info',
                        'summaryText' => 'Showing {start} to {end} of {count} entries',
                        'template' => '{items}<div class="row"><div class="col-md-5 col-sm-12">{summary}</div><div class="col-md-7 col-sm-12">{pager}</div></div><br />',
                    ),
//                    'CDetailView' => array(
//                        'htmlOptions' => array(
//                            'class' => 'table table-condensed',
//                           // 'itemsCssClass' => 'table-responsive',
//                        ),
//                       // 'cssFile' => false,
//                    ),
                ),
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

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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
