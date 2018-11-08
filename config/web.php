<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'E4Q7hUrRbiVfQKM2SpZPNGcERXLGbg03',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
			'news' => 'news/index',
				//'news/view/<id:\d+>' => 'news/view',
				'category' => 'category/index',
				'category/view/<id:\d+>' => 'category/view',
				'realty' => 'realty/index',
				'realty/view/<id:\d+>' => 'realty/view',
				'list' => 'category/list',
				'site/view/<id:\d+>' => 'site/view',
				'view/<id:\d+>' => 'site/view',
				'sale' => 'property-sale/index',
				'housesale' => 'house-sale/index',
				'saleland' => 'sale-land/index',
				'salecommercial' => 'commercial-sale/index',
				'rent' => 'rent/index',
				'renthouse' => 'rent-house/index',
				'rentcommercial' => 'rent-commercial/index',
				'valuation' => 'site/valuation',
				'owners' => 'site/owners',
				'advertising' => 'site/advertising',
				
               // 'GET news/view/<id>' => 'news/view',
            ],
        ],
        
    ],
    'params' => $params,
	'defaultRoute' => 'site/index',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

$config['modules']['admin'] = [
    'class' => 'app\modules\admin\Module',
	];

return $config;
