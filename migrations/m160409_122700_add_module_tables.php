<?php

use yii\db\Migration;

class m160409_122700_add_module_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('module', [
            'id' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'version_id' => $this->string()->notNull(),
        ]);
        $this->addPrimaryKey('module_id', 'module', 'id');
        $this->createIndex('module_is_active', 'module', 'is_active');

        $this->createTable('module_version', [
            'id' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'source' => $this->string()->notNull(),
            'module_id' => $this->string()->notNull(),
        ]);
        $this->addPrimaryKey('module_version_id', 'module_version', 'id');

        $this->addForeignKey('module_version_id__module_version_id', 'module', 'version_id', 'module_version', 'id');
        $this->addForeignKey('module_version_module_id__module_id', 'module_version', 'module_id', 'module', 'id');
    }

    public function safeDown()
    {
        $this->dropIndex('module_is_active','module');
        $this->dropForeignKey('module_version_module_id__module_id','module_version');
        $this->dropForeignKey('module_version_id__module_version_id','module');
        $this->dropTable('module_version');
        $this->dropTable('module');
    }
}
