<?php

namespace app\commands;

use app\components\modules\ModuleActiveRecordTrait;
use app\models\entities\Module;
use app\models\entities\ModuleVersion;
use yii\console\Exception;
use yii\helpers\Console;

class MigrateController extends \yii\console\controllers\MigrateController
{
    /** @var  string */
    public $moduleId;
    /** @var  string */
    public $versionId;
    /** @inheritdoc */
    public $templateFile = '@app/views/migration.php';
    /** @inheritdoc */
    public $migrationTable = 'migration';
    /** @inheritdoc */
    protected $namespace = 'app\migrations';

    /** @inheritdoc */
    public function options($actionId)
    {
        return array_merge(parent::options($actionId), ['moduleId', 'versionId']);
    }

    /** @inheritdoc */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        $this->prepare();
        return true;
    }

    /** @inheritdoc */
    public function actionCreate($name)
    {
        if (!preg_match('/^\w+$/', $name)) {
            throw new Exception("The migration name should contain letters, digits and/or underscore characters only.");
        }
        $className = 'm' . gmdate('ymd_His') . '_' . $name;
        $namespace = $this->namespace;
        $fullClassName = "{$namespace}\\{$className}";
        $file = $this->getFileOfClass($fullClassName);
        if ($this->confirm("Create new migration '$file'?")) {
            $content = $this->renderFile(\Yii::getAlias($this->templateFile), [
                'className' => $className,
                'namespace' => $namespace,
            ]);
            file_put_contents($file, $content);
            $this->stdout("New migration created successfully.\n", Console::FG_GREEN);
        }
    }

    /** @inheritdoc */
    protected function migrateUp($class)
    {
        if ($class === self::BASE_MIGRATION) {
            return true;
        }
        $this->stdout("*** applying $class\n", Console::FG_YELLOW);
        $start = microtime(true);
        $namespace = $this->namespace;
        $fullClass = "{$namespace}\\{$class}";
        $migration = $this->createMigration($fullClass);
        if ($migration->up() !== false) {
            $this->addMigrationHistory($class);
            $time = microtime(true) - $start;
            $this->stdout("*** applied $class (time: " . sprintf("%.3f", $time) . "s)\n\n", Console::FG_GREEN);
            return true;
        } else {
            $time = microtime(true) - $start;
            $this->stdout("*** failed to apply $class (time: " . sprintf("%.3f", $time) . "s)\n\n", Console::FG_RED);
            return false;
        }
    }

    /** @inheritdoc */
    protected function migrateDown($class)
    {
        if ($class === self::BASE_MIGRATION) {
            return true;
        }

        $this->stdout("*** reverting $class\n", Console::FG_YELLOW);
        $start = microtime(true);
        $namespace = $this->namespace;
        $fullClass = "{$namespace}\\{$class}";
        $migration = $this->createMigration($fullClass);
        if ($migration->down() !== false) {
            $this->removeMigrationHistory($class);
            $time = microtime(true) - $start;
            $this->stdout("*** reverted $class (time: " . sprintf("%.3f", $time) . "s)\n\n", Console::FG_GREEN);
            return true;
        } else {
            $time = microtime(true) - $start;
            $this->stdout("*** failed to revert $class (time: " . sprintf("%.3f", $time) . "s)\n\n", Console::FG_RED);
            return false;
        }
    }

    /** @inheritdoc */
    protected function createMigration($class)
    {
        $file = $this->getFileOfClass($class);
        require_once($file);
        return new $class(['db' => $this->db]);
    }

    protected function prepare()
    {
        if ($this->moduleId === null) {
            return;
        }

        $module = Module::find()->byFullId($this->moduleId)->one();
        if (!$module) {
            throw new Exception("Invalid moduleId '{$this->moduleId}'");
        }

        $version = $this->versionId !== null
            ? $module->getVersions()->byId($this->versionId)->one()
            : $module->activeVersion;
        if (!$version) {
            throw new Exception("Invalid versionId '{$this->versionId}'");
        }

        $this->namespace = $this->getNamespace($version);
        $this->migrationTable = $this->getMigrationTable($version);
        $this->migrationPath = $this->getMigrationPath($version);
    }

    /**
     * Returns name of file by className of migration.
     *
     * @param string $className Full class name.
     * @return string Path to file.
     */
    protected function getFileOfClass($className)
    {
        $alias = '@' . str_replace('\\', '/', $className);
        return \Yii::getAlias($alias) . '.php';
    }

    /**
     * Returns migrations namespace.
     *
     * @param ModuleVersion $version
     * @return string
     */
    protected function getNamespace($version)
    {
        $class = $version->source;
        $class = trim($class, '\\');
        $class = substr($class, 0, strrpos($class, '\\') + 1);
        return $class . 'migrations';
    }

    /**
     * Returns migration table.
     *
     * @param ModuleVersion $version
     * @return string
     */
    protected function getMigrationTable($version)
    {
        $prefix = ModuleActiveRecordTrait::getTablePrefix($version->source);
        return $prefix . $this->migrationTable;
    }

    /**
     * Returns migration path.
     *
     * @param ModuleVersion $version
     * @return string
     */
    protected function getMigrationPath($version)
    {
        $alias = '@' . str_replace('\\', '/', $this->getNamespace($version));
        return \Yii::getAlias($alias);
    }
}