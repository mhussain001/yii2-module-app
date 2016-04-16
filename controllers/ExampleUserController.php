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
        return \Yii::t('example-category', 'My mega message');
    }

    public function actionTestModuleMessage()
    {
        return ExampleBilling::t('example-category', 'My mega message');
    }
}