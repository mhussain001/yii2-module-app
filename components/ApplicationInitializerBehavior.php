<?php

namespace app\components;

use app\components\modules\HasEventHandlers;
use app\components\modules\HasUrlRules;
use app\models\entities\Module;
use yii\base\Application;
use yii\base\Behavior;

/**
 * This behavior statically initialize all active modules before application started.
 *
 * @property \yii\base\Application $owner
 */
class ApplicationInitializerBehavior extends Behavior
{
    /** @inheritdoc */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'beforeRequest',
        ];
    }

    public function beforeRequest()
    {
        $modules = Module::find()->roots()->all();
        $modulesConfig = $this->enableModules($modules);
        $this->owner->setModules($modulesConfig);
    }

    /**
     * @param \app\models\entities\Module[] $modules
     * @return array
     */
    private function enableModules($modules)
    {
        $config = [];
        foreach ($modules as $module) {
            if (!$module->activeVersion) {
                continue;
            }
            $this->enableModule($module->activeVersion->source);
            $moduleConfig = [
                'class' => $module->activeVersion->source,
                'modules' => $this->enableModules($module->children),
            ];
            $config[$module->id] = $moduleConfig;
        }
        return $config;
    }

    /**
     * @param string $class
     */
    private function enableModule($class)
    {
        if (is_subclass_of($class , HasEventHandlers::class)) {
            $class::setEventHandlers();
        }
        if (is_subclass_of($class , HasUrlRules::class)) {
            $this->owner->urlManager->addRules($class::getUrlRules());
        }
    }
}