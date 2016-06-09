<?php

namespace app\models\queries;

use app\models\entities\Module;
use paulzi\materializedPath\MaterializedPathQueryTrait;
use yii\db\ActiveQuery;
use yii\db\BatchQueryResult;

/**
 * @method Module[]|BatchQueryResult each($batchSize = 100, $db = null)
 * @method Module[] all($db = null)
 * @method Module one($db = null)
 */
class ModuleQuery extends ActiveQuery
{
    use MaterializedPathQueryTrait;

    /**
     * @param string|array $id
     * @return $this
     */
    public function byId($id)
    {
        return $this->andWhere(['id' => $id]);
    }
}