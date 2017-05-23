<?php

return [
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => \app\components\PhpMessageSource::class,
                    'basePath' => '/messages',
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
         'urlManager' => [
           'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'xdr5^TFC',
        ],
    ],
    'as initializer' => [
        'class' => \app\components\ApplicationInitializerBehavior::class,
    ],
    'params' => require(__DIR__ . '/params.php'),
];