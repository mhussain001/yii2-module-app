<?php

namespace app\modules\mod_a\modules\v1\migrations;

use yii\db\Schema;
use yii\db\Migration;

class m160614_073015_sample_migration extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m160614_073015_sample_migration cannot be reverted.\n";
        return false;
    }
}
