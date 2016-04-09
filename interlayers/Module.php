<?php

namespace app\interlayers;

use yii\web\UrlRuleInterface;

abstract class Module extends \yii\base\Module
{
    /**
     * Return ruls for module.
     *
     * @return UrlRuleInterface[]|array
     */
    public static function getUrlRules()
    {
        return [];
    }

    /**
     * Return event handlers
     *
     * @return array [
     *   eventName => [
     *     handler 1,
     *     handler 2,
     *     ...
     *   ]
     * ]
     */
    public static function getEventHandlers()
    {
        return [];
    }
}