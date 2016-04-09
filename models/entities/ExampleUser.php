<?php

namespace app\models\entities;

use app\components\WebApplication;
use app\events\ExampleUserEvent;
use app\interlayers\ActiveRecord;
use app\models\queries\ExampleUserQuery;

class ExampleUser extends ActiveRecord
{
    /** @return ExampleUserQuery */
    public static function find()
    {
        return new ExampleUserQuery(static::class);
    }

    public function create()
    {
        // Creates user and fire event after that.
        \Yii::$app->eventManager->fire(WebApplication::EVENT_EXAMPLE_USER_CREATE, new ExampleUserEvent($this));
    }
}