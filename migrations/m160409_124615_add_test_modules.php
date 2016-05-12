<?php

namespace app\migrations;

use app\models\entities\Module;
use app\models\entities\ModuleVersion;
use yii\db\Migration;

class m160409_124615_add_test_modules extends Migration
{
    public function safeUp()
    {
        $personnel = new Module([
            'id' => 'personnel',
            'source' => 'app\modules\personnel\Personnel',
        ]);
        $personnel->makeRoot()->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\personnel\modules\v1',
            'module_id' => 'personnel',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\personnel\modules\v2',
            'module_id' => 'personnel',
        ]))->save();
        $personnel->version_id = 'v1';
        $personnel->save();


        $training = new Module([
            'id' => 'training',
            'source' => 'app\modules\personnel\modules\training\Training',
        ]);
        $training->appendTo($personnel)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\personnel\modules\training\modules\v1',
            'module_id' => 'training',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\personnel\modules\training\modules\v2',
            'module_id' => 'training',
        ]))->save();
        $training->version_id = 'v1';
        $training->save();


        $interview = new Module([
            'id' => 'interview',
            'source' => 'app\modules\personnel\modules\interview\Interview',
        ]);
        $interview->appendTo($personnel)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\personnel\modules\interview\modules\v1',
            'module_id' => 'interview',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\personnel\modules\interview\modules\v2',
            'module_id' => 'interview',
        ]))->save();
        $interview->version_id = 'v1';
        $interview->save();


        $archive = new Module([
            'id' => 'archive',
            'source' => 'app\modules\personnel\modules\interview\modules\archive\Archive',
        ]);
        $archive->appendTo($interview)->save();
        (new ModuleVersion([
            'id' => 'v1',
            'source' => 'app\modules\personnel\modules\interview\modules\archive\modules\v1',
            'module_id' => 'archive',
        ]))->save();
        (new ModuleVersion([
            'id' => 'v2',
            'source' => 'app\modules\personnel\modules\interview\modules\archive\modules\v2',
            'module_id' => 'archive',
        ]))->save();
        $archive->version_id = 'v1';
        $archive->save();
    }

    public function safeDown()
    {
    }
}
