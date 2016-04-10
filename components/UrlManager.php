<?php

namespace app\components;

use app\models\entities\ModuleVersion;

class UrlManager extends \yii\web\UrlManager
{
    public $rules = [
        'GET /user/<id:\d+>' => '/example-user/view',
    ];

    /**
     * Register rules for module.
     *
     * @param ModuleVersion $module
     */
    public function registerModuleRules($module)
    {
        $class = $module->source;
        $this->addRules($class::getUrlRules());
    }
}