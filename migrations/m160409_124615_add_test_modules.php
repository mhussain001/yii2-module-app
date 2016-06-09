<?php

namespace app\migrations;

use app\models\entities\Module;
use app\models\entities\ModuleVersion;
use yii\db\Migration;

class m160409_124615_add_test_modules extends Migration
{
    public function safeUp()
    {
        $modA = new Module([
            'id' => 'mod_a',
            'source' => 'app\modules\mod_a\ModA',
        ]);
        $modA->makeRoot()->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\mod_a\modules\v1\V1',
            'module_id' => 'mod_a',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\mod_a\modules\v2\V2',
            'module_id' => 'mod_a',
        ]))->save();
        $modA->version_id = 'v1';
        $modA->save();


        $modB = new Module([
            'id' => 'mod_b',
            'source' => 'app\modules\mod_a\modules\mod_b\modB',
        ]);
        $modB->appendTo($modA)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\mod_a\modules\mod_b\modules\v1\V1',
            'module_id' => 'mod_b',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\mod_a\modules\mod_b\modules\v2\V2',
            'module_id' => 'mod_b',
        ]))->save();
        $modB->version_id = 'v1';
        $modB->save();


        $modC = new Module([
            'id' => 'mod_c',
            'source' => 'app\modules\mod_a\modules\mod_b\modules\mod_c\modC',
        ]);
        $modC->appendTo($modB)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\mod_a\modules\mod_b\modules\mod_c\modules\v1\V1',
            'module_id' => 'mod_c',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\mod_a\modules\mod_b\modules\mod_c\modules\v2\V2',
            'module_id' => 'mod_c',
        ]))->save();
        $modC->version_id = 'v1';
        $modC->save();
    }

    public function safeDown()
    {
    }
}
