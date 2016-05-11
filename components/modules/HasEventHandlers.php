<?php

namespace app\components\modules;

/**
 * Interface for modules who have event handlers.
 */
interface HasEventHandlers
{
    /**
     * Set event handlers.
     */
    public static function setEventHandlers();
}