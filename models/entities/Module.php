<?php

namespace app\models\entities;

use app\interlayers\ActiveRecord;
use app\models\queries\ModuleQuery;
use app\models\queries\ModuleVersionQuery;

/**
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property int $version_id
 * @property string $source
 * @property ModuleVersion[] $versions
 * @property ModuleVersion|null $activeVersion
 */
class Module extends ActiveRecord
{
    /** @return ModuleQuery */
    public static function find()
    {
        return new ModuleQuery(static::class);
    }

    /** @return ModuleVersionQuery */
    public function getVersions()
    {
        return $this->hasMany(ModuleVersion::class, ['module_id' => 'id']);
    }

    /** @return ModuleVersionQuery */
    public function getActiveVersion()
    {
        return $this->hasOne(ModuleVersion::class, [
            'id' => 'version_id',
            'module_id' => 'id',
        ]);
    }
}