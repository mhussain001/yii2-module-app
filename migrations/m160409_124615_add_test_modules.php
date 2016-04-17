<?php

namespace app\migrations;

use yii\db\Migration;

class m160409_124615_add_test_modules extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('module', ['id', 'name','source'], [
            ['example_billing', 'Биллинг', '\app\modules\example_billing\ExampleBilling'],
            ['example_tracker', 'Трекер', '\app\modules\example_tracker\ExampleTracker'],
        ]);
        $this->batchInsert('module_version', ['id', 'module_id', 'name', 'source'], [
            ['v1', 'example_billing', 'Версия 1', '\app\modules\example_billing\modules\v1\V1'],
            ['v2', 'example_billing', 'Версия 2', '\app\modules\example_billing\modules\v2\V2'],
            ['v1', 'example_tracker', 'Версия 1', '\app\modules\example_tracker\modules\v1\V1'],
            ['v2', 'example_tracker', 'Версия 2', '\app\modules\example_tracker\modules\v2\V2'],
        ]);
        $this->update('module',['version_id'=>'v1']);
    }

    public function safeDown()
    {
    }
}
