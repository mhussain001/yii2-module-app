<?php

namespace app\components;


use app\models\entities\Module;

class UrlManager extends \yii\web\UrlManager
{
    /**
     * Register rules for module.
     *
     * @param Module $module
     */
    public function registerModuleRules($module)
    {
        if ($module->activeVersion) {
            $class = $module->activeVersion->source;
            $this->addRules($class::getUrlRules());
        }
    }
}