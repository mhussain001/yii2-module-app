<?php

namespace app\modules\example_billing\modules\v1\components;

use app\events\ExampleUserEvent;

abstract class EventHandler
{
    /**
     * @param ExampleUserEvent $event
     */
    public static function userCreateHandler($event)
    {
        echo 'Handler for core.user.create in exampleBilling.v1 module has been firing.';
    }

    /**
     * @param ExampleUserEvent $event
     */
    public static function userCreateOtherHandler($event)
    {
        echo 'Other handler for core.user.create in exampleBilling.v1 module has been firing.';
    }
}