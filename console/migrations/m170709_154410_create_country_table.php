<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m170709_154410_create_country_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull(),
            'priority' => $this->smallInteger(),
            'gmap' => $this->string(50)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('country');
    }
}
