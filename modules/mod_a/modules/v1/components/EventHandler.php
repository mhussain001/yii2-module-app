<?php

namespace app\modules\mod_a\modules\v1\components;

abstract class EventHandler
{
    /**
     * @param \app\modules\mod_a\events\SampleEvent $event
     */
    public static function sampleEventHandler($event)
    {
        // do something
    }
}