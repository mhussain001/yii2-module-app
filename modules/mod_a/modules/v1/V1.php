<?php

namespace app\modules\mod_a\modules\v1;

use app\components\modules\VersionModule;
use app\modules\mod_a\ModA;
use app\modules\mod_a\modules\v1\components\EventHandler;

class V1 extends VersionModule
{
    /** @inheritdoc */
    protected static function setEventHandlers()
    {
        ModA::addEventListener(ModA::SAMPLE_EVENT, [EventHandler::class, 'sampleEventHandler']);
    }

    /** @inheritdoc */
    protected static function setUrlRules()
    {
        \Yii::$app->getUrlManager()->addRules(
            ['GET /mod_a_v1_message' => '/mod_a/sample/print-message']
        );
    }
}