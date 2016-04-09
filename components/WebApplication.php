<?php

namespace app\components;

use app\models\entities\Module;
use yii\web\Application;

class WebApplication extends Application
{
    /** @inheritdoc */
    public function init()
    {
        parent::init();
        $this->enableModules();
    }

    /**
     * Set common and version subModules for enables modules.
     */
    protected function enableModules()
    {
        $modules = Module::find()->active()->with('activeVersion');
        foreach ($modules->each() as $module) {
            if (!$module->activeVersion) {
                continue;
            }
            $this->setModule($module->id, $module->activeVersion->source);
            $this->urlManager->registerModuleRules($module);
            $this->eventManager->registerModuleHandlers($module);
        }
    }
}