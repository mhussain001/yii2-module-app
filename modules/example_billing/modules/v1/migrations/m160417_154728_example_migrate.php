<?php

namespace app\modules\example_billing\modules\v1\migrations;

use yii\db\Schema;
use yii\db\Migration;

class m160417_154728_example_migrate extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m160417_154728_example_migrate cannot be reverted.\n";
        return false;
    }
}
