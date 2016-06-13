<?php

namespace app\components\modules;

use yii\base\Module;

abstract class VersionModule extends Module
{
    public static function initStatic()
    {
        static::setEventHandlers();
        static::setUrlRules();
        static::setTranslations();
    }

    /**
     * Set handlers for events.
     */
    protected static function setEventHandlers()
    {

    }

    /**
     * Added urlRules to urlManager
     */
    protected static function setUrlRules()
    {

    }

    /**
     * Added message files to map.
     */
    protected static function setTranslations()
    {

    }
}