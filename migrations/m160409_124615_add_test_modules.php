<?php

namespace app\migrations;

use app\models\entities\Module;
use app\models\entities\ModuleVersion;
use yii\db\Migration;

class m160409_124615_add_test_modules extends Migration
{
    public function safeUp()
    {
        $mod1 = new Module([
            'id' => 'mod1',
            'source' => 'app\modules\mod1\Mod1',
        ]);
        $mod1->makeRoot()->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\mod1\modules\v1',
            'module_id' => 'mod1',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\mod1\modules\v2',
            'module_id' => 'mod1',
        ]))->save();
        $mod1->version_id = 'v1';
        $mod1->save();

        $mod2 = new Module([
            'id' => 'mod2',
            'source' => 'app\modules\mod1\modules\mod2\Mod2',
        ]);
        $mod2->appendTo($mod1)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\mod1\modules\mod2\modules\v1',
            'module_id' => 'mod2',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\mod1\modules\mod2\modules\v2',
            'module_id' => 'mod2',
        ]))->save();
        $mod2->version_id = 'v1';
        $mod2->save();

        $mod3 = new Module([
            'id' => 'mod3',
            'source' => 'app\modules\mod1\modules\mod2\modules\Mod3',
        ]);
        $mod3->appendTo($mod2)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\mod1\modules\mod2\modules\mod3\modules\v1',
            'module_id' => 'mod3',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\mod1\modules\mod2\modules\mod3\modules\v2',
            'module_id' => 'mod3',
        ]))->save();
        $mod3->version_id = 'v1';
        $mod3->save();
    }

    public function safeDown()
    {
    }
}
