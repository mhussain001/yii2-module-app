<?php

namespace app\modules\mod_a\modules\v1\models;

use app\components\modules\ModuleActiveRecordTrait;
use app\modules\mod_a\events\SampleEvent;
use app\modules\mod_a\ModA;
use yii\db\ActiveRecord;

class SampleModel extends ActiveRecord
{
    use ModuleActiveRecordTrait;

    public function create()
    {
        ModA::triggerEvent(ModA::SAMPLE_EVENT, new SampleEvent());
    }
}