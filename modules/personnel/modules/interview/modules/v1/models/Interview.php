<?php

namespace app\modules\personnel\modules\interview\modules\v1\models;

use app\modules\personnel\modules\interview\events\InterviewEvent;
use app\modules\personnel\modules\interview\Interview as InterviewModule;

class Interview extends \app\modules\personnel\modules\interview\models\Interview
{
    public function printTestMessage()
    {
        echo 'Interview from module "personnel.interview(v1)"';
    }

    public function export()
    {
        // Export interview
        \Yii::$app->getModule('interview')->trigger(
            InterviewModule::EVENT_V1_INTERVIEW_EXPORTED,
            new InterviewEvent($this)
        );
    }
}