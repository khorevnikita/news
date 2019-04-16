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
            'cookieValidationKey' => 'vfGYDcRfKV_Ufoa-ZD5D6yh9Nl9w9HMm',
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
            //'enableStrictParsing' => false,
            'rules' => [
                '/' => 'site/index',
                // Просмотр списка новостей
                '<controller>'=>'<controller>/index',
                '<controller>/create'=>'<controller>/index',

                // Просмотр новости
                '<controller>/<alias:[a-zA-Z0-9\-_?\')(]+>'=>'<controller>/view',
                '<controller>/<alias:[a-zA-Z0-9\-_?\')(]+>/edit'=>"<controller>/view",

                // Остальные (а вдруг?) машруты
               // '<controller>/<alias:[a-zA-Z0-9\-_?)(]+>/<action>'=>'<controller>/<action>',
                '<controller>/<action>'=>'<controller>/<action>',


                // Маршруты редактирования
                'admin/<controller>/create'=>'<controller>/create',
                'admin/<controller>/<alias:[a-zA-Z0-9\-_?\')(]+>/edit'=>'<controller>/edit',

                //'<module:cabinet>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
                //'<module:cabinet>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                //'<module:cabinet>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'ru-RU',
            'currencyCode' => 'RUB',
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'Europe/Moscow',
            'datetimeFormat' => 'php:d-m-Y H:i',
            'dateFormat' => 'php:Y-m-d',
        ],
    ],

    'params' => $params,
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

return $config;
