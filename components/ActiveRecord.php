<?php

namespace app\components;

abstract class ActiveRecord extends \yii\db\ActiveRecord
{
    /** @return ActiveQuery */
    public static function find()
    {
        return new ActiveQuery(static::class);
    }
}