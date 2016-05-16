<?php

namespace app\modules\personnel\models;

use app\components\modules\ModuleActiveRecordTrait;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 */
class Employee extends ActiveRecord
{
    use ModuleActiveRecordTrait;

    public function printTestMessage()
    {
        echo 'Employee from module "personnel(root)"';
    }
}