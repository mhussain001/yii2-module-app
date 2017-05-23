<?php

namespace app\migrations;

use yii\db\Migration;

class m160409_122700_add_module_tables extends Migration
{
    public function safeUp()
    {
        /*
        $this->createTable('module', [
            'id' => $this->string()->notNull(),
            'source' => $this->string()->notNull(),
            'path' => $this->string()->notNull(),
            'depth' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('module_pk', 'module', 'id');
        */
        $this->createTable('module_version', [
            'id' => $this->string()->notNull(),
            'module_id' => $this->string()->notNull(),
            'is_active' => $this->boolean()->notNull()->defaultValue(false),
            'source' => $this->string()->notNull(),
        ]);
        $this->addPrimaryKey('module_version_pk', 'module_version', ['id', 'module_id']);
        $this->addForeignKey('module_version_module_id__module_id', 'module_version', 'module_id', 'module', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('module_version_module_id__module_id', 'module_version');
        $this->dropTable('module_version');
        $this->dropTable('module');
    }
}
