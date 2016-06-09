<?php

namespace app\components\modules;

use yii\base\Module;

abstract class VersionModule extends Module
{
    /**
     * @return array List of event handlers
     */
    public static function getEventHandlers()
    {

    }

    /**
     * @return array|\yii\web\UrlRuleInterface[] List of url rules.
     * @see \yii\web\UrlManager::addRules()
     */
    public static function getUrlRules()
    {
        return [];
    }
}