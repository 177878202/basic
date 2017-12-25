<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    // 'defaultRoute' => 'yc',
    'name'=>'5i28.cn',//当前应用的名称
    // 配置语言
    'language'=>'zh-CN',
    // 配置时区
    'timeZone'=>'Asia/Chongqing',

    'id' => '5i28_cn',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vv28_YII2',
            'csrfParam' => '_csrf-5i28',
        ],
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'cache' => [
//            'class' => 'yii\caching\FileCache',
            'class' => 'yii\redis\Cache',
            'redis' => [
                'class' => 'yii\redis\Connection',
                'hostname' => '127.0.0.1',
                'port' => 6379,
                'database' => 0,
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix'=>'',
            'rules' => [
                //'<controller:(zst)>'=>'<controller>/index',
//                '<controller:(zst)+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>/<algorithm:\d+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>/<algorithm:\d+>/<list:\d+>'=>'<controller>/index',
//                '<controller:(zst)>/<action:\w+>/'=>'<controller>/<action>',
//                '<controller:(zst)>/<action:\w+>/<type:\w+>/'=>"<controller>/<action>",
//                '<controller:(zst)>/<action:\w+>/<type:\w+>/<algorithm:\d+>/'=>'<controller>/<action>',
                '<controller:(zst|kxt)>/<action:\w+>/<type:\w+>/<algorithm:\d+>/<tid:\d+>/<list:\d+>'=>'<controller>/<action>',
                '<controller:(zst|kxt)>/<action:\w+>/<type:\w+>/<algorithm:\d+>/<tid:\d+>'=>'<controller>/<action>',
                '<controller:(zst|kxt)>/<action:\w+>/<type:\w+>/<algorithm:\d+>'=>'<controller>/<action>',
                '<controller:(zst|kxt)>/<action:\w+>/<type:\w+>'=>'<controller>/<action>',
//                '<controller:(zst)>/<type:\w+>/<algorithm:\d+>/<list:\d+>_<page:\d+>_<per-page:\d+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>/<algorithm:\d+>/<list:\d+>_<page:\d+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>/<algorithm:\d+>/<list:\d+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>/<algorithm:\d+>'=>'<controller>/index',
//                '<controller:(zst)>/<type:\w+>'=>'<controller>/index',
//                '<controller:(zst)>'=>'<controller>/index',
                //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                //'<controller:\w+>/<id:\d+>/<action:(create|update|delete|ready|betting)>/<bid:\d+>'=>'<controller>/<action>',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-5i28', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => '5i28_cn',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            // send all mails to a file by default. You have to set
//            // 'useFileTransport' to false and configure a transport
//            // for the mailer to send real emails.
//            'useFileTransport' => true,
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer', //服务器类
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件</span>
            'transport' => [
                'class' => 'Swift_SmtpTransport', //使用的类
                'host' => 'smtp.qq.com', //邮箱服务一地址
                'username' => '772703033@qq.com',//邮箱地址，发送的邮箱
                'password' => 'ugekmbcmneeabcdb',  //自己填写邮箱密码
                'port' => '465',  //服务器端口
                'encryption' => 'ssl', //加密方式
            ],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
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
