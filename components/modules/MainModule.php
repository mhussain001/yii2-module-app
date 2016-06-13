<?php

namespace app\components\modules;

use app\models\entities\Module as ModuleAr;
use yii\base\Event;
use yii\base\Module;
use yii\helpers\Inflector;

/**
 * Trait for main modules.
 */
abstract class MainModule extends Module
{
    /**
     * @param string $name
     * @param callable $handler
     * @param mixed $data = null
     * @param boolean $append = true
     * @see \yii\base\Event::on()
     */
    public static function addEventListener($name, $handler, $data = null, $append = true)
    {
        Event::on(static::class, $name, $handler, $data, $append);
    }

    /**
     * @param string $name
     * @param callable $handler
     * @see \yii\base\Event::off()
     * */
    public static function removeEventListener($name, $handler)
    {
        Event::off(static::class, $name, $handler);
    }

    /**
     * @param string $name
     * @param Event $event = null
     * @see \yii\base\Event::trigger()
     */
    public static function triggerEvent($name, $event = null)
    {
        Event::trigger(static::class, $name, $event);
    }

    /**
     * Return an instance of $className from $version submodule.
     *
     * @param string $className Name of class relatively of module's root.
     * @param array $constructorArgs = [] Arguments for constructor.
     * @param string $moduleVersion = null Id of module's version. If null, active version will be used.
     * @return mixed|null An instance of class or null if module has not active version or class does not exist.
     * @throws \yii\base\Exception
     */
    public static function getObject($className, array $constructorArgs = [], $moduleVersion = null)
    {
        $class = static::getClass($className, $moduleVersion);
        return $class === null ? null : new $class(...$constructorArgs);
    }

    /**
     * Return full name of $className from $version submodule.
     *
     * @param string $className Name of class relatively of module's root.
     * @param string $moduleVersion = null Id of module's version. If null, active version will be used.
     * @return mixed Class name or null if module has not active version or class does not exist.
     * @throws \yii\base\Exception
     */
    public static function getClass($className, $moduleVersion = null)
    {
        $class = static::createVersionClassName($className, $moduleVersion);
        return $class && class_exists($class) ? $class : null;
    }

    /**
     * Creates full name of class by his relative name and version of module.
     *
     * @param string $name Name of class relatively of module's root.
     * @param string $moduleVersion = null Id of module's version. If null, active version will br used.
     * @return string|null Full name of class. Null if module has not active version or class does not exist.
     */
    private static function createVersionClassName($name, $moduleVersion = null)
    {
        $moduleClass = static::class;
        $moduleId = Inflector::underscore(substr($moduleClass, strrpos($moduleClass, '\\') + 1));
        if ($moduleVersion === null) {
            $moduleVersion = ModuleAr::getActiveVersionIdByModuleId($moduleId);
        }
        if ($moduleVersion === null) {
            return null;
        }

        $namespace = substr($moduleClass, 0, strrpos($moduleClass, '\\'));
        $className = ltrim($name, "\\");
        return "\\{$namespace}\\modules\\{$moduleVersion}\\{$className}";
    }
}