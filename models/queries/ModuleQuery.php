<?php

namespace app\models\queries;

use app\models\entities\Module;
use yii\db\ActiveQuery;
use yii\db\BatchQueryResult;

/**
 * @method Module[]|BatchQueryResult each($batchSize = 100, $db = null)
 * @method Module[] all($db = null)
 * @method Module one($db = null)
 */
class ModuleQuery extends ActiveQuery
{
    /**
     * @param bool $isActive = true
     * @return $this
     */
    public function active($isActive = true)
    {
        return $isActive
            ? $this->andWhere('version_id is not null')
            : $this->andWhere('version_id is null');
    }

    /**
     * @param string|array $id
     * @return $this
     */
    public function byId($id)
    {
        return $this->andWhere(['id' => $id]);
    }
}