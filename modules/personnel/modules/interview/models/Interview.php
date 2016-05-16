<?php

namespace app\modules\personnel\modules\interview\models;

use app\components\modules\ModuleActiveRecordTrait;
use app\modules\personnel\modules\interview\events\InterviewEvent;
use app\modules\personnel\modules\interview\Interview as InterviewModule;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $date
 */
class Interview extends ActiveRecord
{
    use ModuleActiveRecordTrait;

    public function printTestMessage()
    {
        echo 'Interview from module "personnel.interview(root)"';
    }

    public function create()
    {
        // Create this interview
        \Yii::$app->getModule('interview')->trigger(
            InterviewModule::EVENT_INTERVIEW_CREATED,
            new InterviewEvent($this)
        );
    }
}