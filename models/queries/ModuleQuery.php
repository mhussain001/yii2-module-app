<?php

namespace app\models\queries;

use app\interlayers\ActiveQuery;

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