<?php

namespace app\components\modules;

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * Trait for active records placed inside modules.
 */
trait ModuleActiveRecordTrait
{
    /** @inheritdoc */
    public static function tableName()
    {
        $className = static::class;
        return
            static::getTablePrefix($className) .
            Inflector::camel2id(StringHelper::basename($className), '_');
    }

    /**
     * Generate prefix for table name based on module id and name.
     *
     * @param string $className
     * @return string
     */
    public static function getTablePrefix($className)
    {
        $moduleIds = explode('\\modules\\', $className);
        unset($moduleIds[0]);
        $lastId =& $moduleIds[count($moduleIds)];
        $lastId = substr($lastId, 0, strpos($lastId, '\\'));
        return implode('_', $moduleIds) . '_';
    }
}