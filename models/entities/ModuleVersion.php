<?php

namespace app\models\entities;

use app\models\queries\ModuleVersionQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $source
 * @property int $module_id
 * @property Module $main
 */
class ModuleVersion extends ActiveRecord
{
    /** @inheritdoc */
    public static function find()
    {
        return new ModuleVersionQuery(static::class);
    }

    public function getMain()
    {
        return $this->hasOne(Module::class, ['id' => 'module_id']);
    }
}