<?php

namespace app\controllers;

use app\components\WebController;
use app\modules\example_billing\ExampleBilling;

class ExampleUserController extends WebController
{
    public function actionList()
    {
        return "User list";
    }

    public function actionView($id)
    {
        return "User view: id={$id}";
    }

    public function actionTestMessage()
    {
        \Yii::t('example-category', 'My mega message');

        \Yii::t('example_billing.example-category', 'My mega message');

        \Yii::t('example_billing.v1.example-category', 'My mega message');
        ExampleBilling::t('example-category', 'My mega message');
        ExampleBilling::t('example-category', 'My mega message', [], null, 'v1');
    }

    public function actionTestFacades()
    {
        $object = ExampleBilling::getObject('models\entities\ExampleInvoice');
        if ($object) {
            print_r($object->attributes);
        }
    }
}