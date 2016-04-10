<?php

namespace app\components;

use app\models\entities\Module;
use app\modules\example_billing\ExampleBilling;
use yii\web\Application;

class WebApplication extends Application
{
    const EVENT_EXAMPLE_USER_CREATE = 'core.exampleUser.create';

    /** @inheritdoc */
    public function init()
    {
        parent::init();
        $this->registerEventHandlers();
        $this->enableModules();
    }

    /**
     * Set modules.
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

    /**
     * Registers core event handlers.
     */
    protected function registerEventHandlers()
    {
        $this->eventManager->registerHandlers([
            ExampleBilling::EVENT_EXAMPLE_INVOICE_CREATE => [
                /** @see \app\components\EventHandler::invoiceCreateHandler() */
                [EventHandler::class, 'invoiceCreateHandler'],
            ],
        ]);
    }
}