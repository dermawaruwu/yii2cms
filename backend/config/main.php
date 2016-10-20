<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => "TITIKOMA",
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
             // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'gSkfEcsyvbsxbDXAhyDKbHVqCuexrWGrJFCvfrXLfnpETkmuFaZfoBvDFyxAbynckyVUMpvFIkkMUaYzOhjppmhKXJIxmuUGTLhj',
            'csrfParam' => '_backendCSRF',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_backendUser', 'httpOnly' => true],
        ],
        // Untuk pengaturan admin LTE bawaan, referensi https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html
        /*'view' => [
            'theme' => [
                'pathMap' => [
                    //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                    '@app/views' => '@vendor/almasaeed2010/adminlte/pages'
                ],
            ],
        ],*/
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 
                        //'skin-black',
                        "skin-blue",
                        //"skin-black",
                        //"skin-red",
                        //"skin-yellow",
                        //"skin-purple",
                        //"skin-green",
                        //"skin-blue-light",
                        //"skin-black-light",
                        //"skin-red-light",
                        //"skin-yellow-light",
                        //"skin-purple-light",
                        //"skin-green-light"
                ],
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'savePath' => sys_get_temp_dir(),
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
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
