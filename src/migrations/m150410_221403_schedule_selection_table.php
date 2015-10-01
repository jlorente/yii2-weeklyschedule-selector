<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */
use yii\db\Schema;
use yii\db\Migration;
use jlorente\weeklyschedule\db\Schedule;

/**
 * Configuration variables table creation. If you downloaded a prerelease 
 * package you should run also the migration in order to set the definitive 
 * table name.
 * 
 * To apply this migration run:
 * ```bash
 * $ ./yii migrate --migrationPath=@vendor/jlorente/yii2-weeklyschedule-selector/src/migrations
 * ```
 * 
 * @author José Lorente <jose.lorente.martin@gmail.com>
 */
class m150410_221403_schedule_selection_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createPackage();
    }

    /**
     * Table creation.
     */
    protected function createPackage() {
        $this->createTable(Schedule::className(), [
            'id' => Schema::TYPE_PK,
            'model_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
            'updated_by' => Schema::TYPE_INTEGER
        ]);
        $this->createTable($this->getTableName(), [
            'schedule_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'day' => Schema::TYPE_INTEGER . ' NOT NULL',
            'from' => Schema::TYPE_STRING . ' NOT NULL',
            'to' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
            'updated_by' => Schema::TYPE_INTEGER
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable($this->getTableName());
    }

    /**
     * Returns the table name of the variable model. You can override this 
     * method in order to provide a custom table name.
     * 
     * @return string
     */
    protected function getTableName() {
        return Variable::tableName();
    }

}
