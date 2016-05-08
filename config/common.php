<?php

return [
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
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
    ],
    'params' => require(__DIR__ . '/params.php'),
];