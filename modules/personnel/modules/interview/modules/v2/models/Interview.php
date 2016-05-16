<?php

namespace app\modules\personnel\modules\interview\modules\v2\models;

class Interview extends \app\modules\personnel\modules\interview\models\Interview
{
    public function printTestMessage()
    {
        echo 'Interview from module "personnel.interview(v2)"';
    }
}