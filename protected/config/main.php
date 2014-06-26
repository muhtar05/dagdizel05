<?php


$dirs = scandir(dirname(__FILE__).'/../modules');

$modules = array();
foreach($dirs as $name)
{
    if($name[0] != '.')
        $modules[$name] = array('class'=>'application.modules.'.$name.'.'.ucfirst($name).'Module');
}

define('MODULES_MATCHES', implode('|', array_keys($modules)));

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Dagdizel',
    'language'=>'ru',
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.modules.*',
        'application.helpers.*',
		'application.components.*',
        'application.behaviors.*',
	),

    'behaviors'=>array(
        array(

            'class'=>'DModuleUrlRulesBehavior',
            'beforeCurrentModule'=>array(
            ),
            'afterCurrentModule'=>array()
        )
    ),

	'modules'=>array_replace($modules,array(
        'auth',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		)
	)),

	// application components
	'components'=>array(
		'user'=>array(
            'class'=>'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            //'params' => array('directory' => '/images/picture_spread/'),
        ),


		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(

				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

              /*  // небольшая защита от дублирования адресов
                '<module:' . MODULES_MATCHES . '>/default/index'=>'main/error/error404',
                '<module:' . MODULES_MATCHES . '>/default'=>'main/error/error404',
                // правила для экшенов админки
                '<module:' . MODULES_MATCHES . '>/<controller:\w+[Aa]dmin>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
                '<module:' . MODULES_MATCHES . '>/<controller:\w+[Aa]dmin>'=>'<module>/<controller>/index',
                '<module:' . MODULES_MATCHES . '>/<controller:\w+[Aa]dmin>/<action:\w+>'=>'<module>/<controller>/<action>'*/
			),
		),
        'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=fcdagdizel',
                'emulatePrepare' => true,
                'username' => 'fcdagdizel',
                'password' => 'dizel2013',
                'charset' => 'utf8',
                'tablePrefix'=>'dg_',
                // включаем профайлер
                'enableProfiling'=>true,
                // показываем значения параметров
                'enableParamLogging' => true,
            ),
        /*'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=poramidol_fcdagdizel',
            'emulatePrepare' => true,
            'username' => 'poramidol',
            'password' => '1qa2ws3ed',
            'charset' => 'utf8',
            'tablePrefix'=>'dg_',
            // включаем профайлер
            'enableProfiling'=>true,
            // показываем значения параметров
            'enableParamLogging' => true,
        ),*/

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
//
//                array(
//                    // направляем результаты профайлинга в ProfileLogRoute (отображается
//                    // внизу страницы)
//                    'class'=>'CProfileLogRoute',
//                    'levels'=>'profile',
//                    'enabled'=>true,
//                ),
				/*array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),*/
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