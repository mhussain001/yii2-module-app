<?php

namespace app\components;

use app\models\entities\Module;

class EventManager
{
    /**
     * Register handlers for module.
     *
     * @param Module $module
     */
    public function registerModuleHandlers($module)
    {
        if ($module->activeVersion) {
            $class = $module->activeVersion->source;
            $handlers = $class::getEventHandlers();
            foreach ($handlers as $event => $callbacks) {
                if (!is_array($callbacks)) {
                    $callbacks = [$callbacks];
                }
                foreach ($callbacks as $callback) {
                    \Yii::$app->on($event, $callback);
                }
            }
        }
    }
}