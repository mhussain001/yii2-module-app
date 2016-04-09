<?php

return \yii\helpers\ArrayHelper::merge(require(__DIR__ . '/common.php'), [
    'id' => 'yii2-module-app-web',
    'components' => [
        'urlManager' => [
            'class' => \app\components\UrlManager::class,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
        ],
    ],
]);
