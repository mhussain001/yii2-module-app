<?php

namespace app\modules\personnel\modules\interview\modules\v1\controllers;

use app\modules\personnel\modules\interview\Interview;
use yii\web\Controller;

class InterviewController extends Controller
{
    public function actionView($id)
    {
        $model = Interview::getClass('models\Interview');
        $record = $model::findOne($id);
        return $record;
    }
}