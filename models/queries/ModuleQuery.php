<?php

namespace app\models\queries;

use app\interlayers\ActiveQuery;
use app\models\entities\Module;

/**
 * @method Module[] each($batchSize = 100, $db = null)
 * @method Module[] all($db = null)
 * @method Module one($db = null)
 * @method Module oneOrException($db = null, $exceptionMessage = null)
 */
class ModuleQuery extends ActiveQuery
{
    /**
     * @param bool $isActive = true
     * @return $this
     */
    public function active($isActive = true)
    {
        return $this->andWhere(['is_active' => $isActive]);
    }
}