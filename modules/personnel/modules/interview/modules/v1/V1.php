<?php

namespace app\modules\personnel\modules\interview\modules\v1;

use app\components\modules\HasUrlRulesInterface;
use yii\base\Module;

class V1 extends Module implements HasUrlRulesInterface
{
    /** @inheritdoc */
    public static function getUrlRules()
    {
        return [
            'GET interview/<id:\d+>' => 'personnel/interview/interview/view',
        ];
    }
}