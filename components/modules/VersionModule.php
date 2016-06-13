<?php

namespace app\components\modules;

use yii\base\Module;

abstract class VersionModule extends Module
{
    /**
     * Return list of eventHandlers.
     * @return array [
     *   moduleClass => [
     *     event,ame => handler
     *   ]
     * ]
     */
    protected static function getEventHandlers(){
        return [];
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