<?php

namespace app\modules\mod_a\modules\v1;

use app\components\modules\VersionModule;
use app\modules\mod_a\ModA;
use app\modules\mod_a\modules\v1\components\EventHandler;

class V1 extends VersionModule
{
    /** @inheritdoc */
    public static function getEventHandlers()
    {
        return [
            ModA::class=>[
                ModA::SAMPLE_EVENT=> [EventHandler::class, 'sampleEventHandler'],
            ],
        ];
    }

    /** @inheritdoc */
    public static function getUrlRules()
    {
        return [
            'GET /mod_a_v1_message' => '/mod_a/sample/print-message',
        ];
    }
}