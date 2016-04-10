<?php

namespace app\modules\example_billing\modules\v1;

use app\components\WebApplication;
use app\components\VersionModule;
use app\modules\example_billing\modules\v1\components\EventHandler;

class V1 extends VersionModule
{
    /** @inheritdoc */
    public static function getEventHandlers()
    {
        return [
            WebApplication::EVENT_EXAMPLE_USER_CREATE => [
                /** @see \app\modules\example_billing\modules\v1\components\EventHandler::userCreateHandler() */
                [EventHandler::class, 'userCreateHandler'],
                /** @see \app\modules\example_billing\modules\v1\components\EventHandler::userCreateOtherHandler() */
                [EventHandler::class, 'userCreateOtherHandler'],
            ],
        ];
    }

    /** @inheritdoc */
    public static function getUrlRules()
    {
        return[
            'GET /invoice/<id:\d+>'=>'/example_billing/example-invoice/view',
        ];
    }
}