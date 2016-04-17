<?php

return \yii\helpers\ArrayHelper::merge(require(__DIR__ . '/common.php'), [
    'id' => 'yii2-module-app-console',
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'migrate' => [
            'class' => \app\commands\MigrateController::class,
        ],
    ],
]);