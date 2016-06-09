<?php

namespace app\modules\mod_a\modules\mod_b\modules\v1;

use app\components\modules\HasUrlRulesInterface;
use yii\base\Module;

class V1 extends Module implements HasUrlRulesInterface
{
    /** @inheritdoc */
    public static function getUrlRules()
    {
        return [

        ];
    }
}