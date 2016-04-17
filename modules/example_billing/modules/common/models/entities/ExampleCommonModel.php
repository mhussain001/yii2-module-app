<?php

namespace app\modules\example_billing\modules\v1\models\entities;

use app\modules\example_billing\ExampleBilling;

class ExampleCommonModel
{
    public function testMethod()
    {
        $class = ExampleBilling::getClass('models\entities\ExamplePrice');
        if ($class) {
            $list = $class::find()->all();
            // ...
        }
    }
}