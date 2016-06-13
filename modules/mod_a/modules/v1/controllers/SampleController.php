<?php

namespace app\modules\mod_a\modules\v1\controllers;

use yii\web\Controller;

class SampleController extends Controller
{
    public function actionPrintMessage()
    {
        return 'Sample message';
    }
}