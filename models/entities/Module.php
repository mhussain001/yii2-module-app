<?php

namespace app\models\entities;

use app\components\ActiveRecord;
use app\models\queries\ModuleQuery;
use app\models\queries\ModuleVersionQuery;

/**
 * @property int $id
 * @property string $name
 * @property int $version_id
 * @property string $source
 * @property ModuleVersion[] $versions
 * @property ModuleVersion|null $activeVersion
 */
class Module extends ActiveRecord
{
    private static $activeVersionIds = [];

    /** @return ModuleQuery */
    public static function find()
    {
        return new ModuleQuery(static::class);
    }

    /**
     * Return id of active version for module.
     * @param string $moduleId
     * @return string|null
     */
    public static function getActiveVersionIdByModuleId($moduleId)
    {
        if (!isset(static::$activeVersionIds[$moduleId])) {
            $id = static::find()
                ->select('version_id')
                ->andWhere(['id' => $moduleId])
                ->active()
                ->scalar();

            static::$activeVersionIds[$moduleId] = $id ?: null;
        }
        return static::$activeVersionIds[$moduleId];
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