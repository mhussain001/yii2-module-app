<?php

namespace app\modules\example_billing\modules\v1\controllers;

use app\components\WebController;

class ExampleInvoiceController extends WebController
{
    public function actionList()
    {
        return "Invoice list (v1)";
    }

    public function actionView($id)
    {
        return "Invoice view (v1): id={$id}";
    }
}