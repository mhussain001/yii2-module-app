<?php

namespace app\components;


use app\models\entities\Module;

class UrlManager extends \yii\web\UrlManager
{
    public $rules=[
        'GET /user/<id:\d+>'=>'/example-user/view',
    ];

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