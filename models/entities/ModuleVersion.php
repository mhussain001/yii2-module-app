<?php

namespace app\models\entities;

use app\interlayers\ActiveRecord;
use app\models\queries\ModuleVersionQuery;

/**
 * @property int $id
 * @property string $name
 * @property string $source
 * @property int $module_id
 */
class ModuleVersion extends ActiveRecord
{
    /** @inheritdoc */
    public static function find()
    {
        return new ModuleVersionQuery(static::class);
    }
}