<?php

namespace app\components\modules;

/**
 * Interface for modules who have url rules.
 */
interface HasUrlRulesInterface
{
    /**
     * @return array|\yii\web\UrlRuleInterface[] List of url rules.
     * @see \yii\web\UrlManager::addRules()
     */
    public static function getUrlRules();
}