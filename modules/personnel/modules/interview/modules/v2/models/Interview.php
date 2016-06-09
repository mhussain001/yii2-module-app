<?php

namespace app\modules\personnel\modules\interview\modules\v2\models;

use app\components\modules\ModuleActiveRecordTrait;
use yii\db\ActiveRecord;

class Interview extends ActiveRecord
{
    use ModuleActiveRecordTrait;

    public function printTestMessage()
    {
        echo 'Interview from module "personnel.interview(v2)"';
    }
}