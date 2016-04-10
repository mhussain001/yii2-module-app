<?php

namespace app\controllers;

use app\components\WebController;

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
}