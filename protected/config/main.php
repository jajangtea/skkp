<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'SKKP',
    // 'defaultController' => 'pendaftaran', 
    'timeZone' => 'Asia/Jakarta',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.bootstrap.components.*',
        'application.extensions.ekeepselection.*',
        'application.extensions.qrcode.*',
        'application.extensions.tcpdf.*',
        'application.extensions.mpdf.*',
        'application.extensions.yiidropbox.*',
    ),
    'modules' => array(
        //languange
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '0000',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    'sourceLanguage' => 'id',
    'language' => 'id',
    // application components
    'components' => array(
        'apiAuth' => array(
            'class' => 'ext.apiAuth.ApiAuth',
            // Below are the Extensions configurable attributes, specified with their default values.
            // The optional values can be left out of the configuration file (will get default values specified here)
            //'realm' => 'Restricted Area',                     //optional
            //'protocol' => 'digest',                           //optional: 'basic' or 'digest' (recommended)
            //'hash' => null,                                   //optional: empty or 'md5' (recommended. See comment on apiAuthPasswordAttribute)
            // The name of your (api) user model (i.e.: this can be your front-end User model, or a custom Api User model)
            'userClass' => 'User', //required
            // Let apiAuth know where to find required user model attributes
            'userIdAttribute' => 'id', //required
            'usernameAttribute' => 'username', //required, will be used for authentication, unless apiAuthUsernameAttribute is set.
            'passwordAttribute' => 'password', //required, will be used for authentication, unless apiAuthPasswordAttribute is set.
            //You can specify a different username for API authentication, which doesn't have to be the same as 'usernameAttribute'. When left unset, this value will be set to the same value as usernameAttribute
            'apiAuthUsernameAttribute' => 'username', //optional, when left unset, this property will take it's value from 'usernameAttribute'
            // IMPORTANT note about 'apiAuthPasswordAttribute': 
            // apiAuth uses the value of apiAuthPasswordAttribute for password verification. 
            // It's property MUST be availble in the user model. It can be left empty or unspecified
            // in which case it will be set to the same value as 'passwordAttribute' when the extension is
            // initialized. 
            //
				// Please note that there are specific requirements as to how passwords are stored:
            // * When using 'hash' => null, store the password in plain-text.
            // * When using 'hash' => 'md5', encrypt your passwords using: 
            //
				//		$user->{apiAuthPasswordAttribute} = Yii::app()->apiAuth->encryptPassword($username, $password);
            //
				// The application's realm setting should NEVER be changed after storing digest encrypted passwords.
            // If the application's realm or the username changes, the encrypted password should be 
            // updated as well, which shall be quite difficult to do if you don't have the unencrypted password.
            'apiAuthPasswordAttribute' => 'api_password', //optional, when left unset, this property will take it's value from 'passwordAttribute'
            'activeAttribute' => null, //optional, specify your user models boolean 'is active' attribute if it has one. When the user's attribute evalutes to false, authentication will fail.
            'blockedAttribute' => null, //optional, specify your user models boolean 'is blocked' attribute if it has one. When the user's attribute evalutes to true, authentication will fail.
        // It is strongly recommended to leave the following setting on it's default value. 
        // If you do override it, make sure you change it to a derived class of AUserIdentity.
        //'userIdentityClass' => 'AUserIdentity',           //optional
        ),
        'dropbox' => array(
            'class' => 'ext.yiidropbox.YiiDropbox',
            'appKey' => 'wta7tqqf0cukx4d',
            'appSecret' => 'uwn7jayao08fw0t',
            'root' => 'dropbox' //or 'sandbox'
        ),
        'localtime' => array(
            'class' => 'LocalTime',
        ),
        'user' => array(
            // enable cookie-based authentication
            'class' => 'application.components.EWebUser',
            'allowAutoLogin' => true,
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
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
               '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                // REST patterns
                array('api/list', 'pattern' => '<model:\w+>', 'verb' => 'POST'),
                array('api/view', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'GET'),
                array('api/update', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'PUT'), // Update
                array('api/delete', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                array('api/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'), // Create
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'showScriptName'=>false,
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'uploadDir' => 'upload2/',
    ),
);
