<?php

namespace app\modules\personnel\modules\interview;

use app\components\modules\MainModuleTrait;
use yii\base\Module;

class Interview extends Module
{
    use MainModuleTrait;

    const EVENT_INTERVIEW_CREATED = 'interview.created';
    const EVENT_V1_INTERVIEW_EXPORTED = 'v1.interview.exported';
}