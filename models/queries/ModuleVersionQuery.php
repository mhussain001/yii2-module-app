<?php

namespace app\models\queries;

use app\models\entities\ModuleVersion;
use yii\db\ActiveQuery;
use yii\db\BatchQueryResult;

/**
 * @method ModuleVersion[]|BatchQueryResult each($batchSize = 100, $db = null)
 * @method ModuleVersion[] all($db = null)
 * @method ModuleVersion one($db = null)
 */
class ModuleVersionQuery extends ActiveQuery
{
    /**
     * @param string|array $id
     * @return $this
     */
    public function byId($id)
    {
        return $this->andWhere(['id' => $id]);
    }
}