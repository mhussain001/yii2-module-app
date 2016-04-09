<?php

use yii\db\Migration;

class m160409_124615_add_test_modules extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('module', ['id', 'name','source'], [
            ['module1', 'Модуль 1', '\app\modules\module1\Module1'],
            ['module2', 'Модуль 2', '\app\modules\module2\Module2'],
        ]);
        $this->batchInsert('module_version', ['id', 'module_id', 'name', 'source'], [
            ['v1', 'module1', 'Версия 1', '\app\modules\module1\modules\v1\V1'],
            ['v2', 'module1', 'Версия 2', '\app\modules\module1\modules\v2\V2'],
            ['v1', 'module2', 'Версия 1', '\app\modules\module2\modules\v1\V1'],
            ['v2', 'module2', 'Версия 2', '\app\modules\module2\modules\v2\V2'],
        ]);
        $this->update('module',['version_id'=>'v1']);
    }

    public function safeDown()
    {
    }
}
