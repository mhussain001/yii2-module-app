<?php

namespace app\components;

use app\models\entities\Module;
use app\models\entities\ModuleVersion;
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
            $version = $module->activeVersion;
            $this->enableModule($version);
            $moduleConfig = [
                'class' => $version->source,
                'modules' => $this->enableModules($module->children),
            ];
            $config[$module->id] = $moduleConfig;
        }
        return $config;
    }

    /**
     * @param ModuleVersion $version
     */
    private function enableModule($version)
    {
        $this->enableModuleUrlRules($version);
    }

    /**
     * @param ModuleVersion $version
     */
    private function enableModuleUrlRules($version)
    {
        $class = $version->source;
        $this->owner->getUrlManager()->addRules($class::getUrlRules());
    }
}