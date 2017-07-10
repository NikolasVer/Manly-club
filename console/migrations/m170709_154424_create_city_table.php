<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m170709_154424_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey()->unsigned(),
            'country_id' => $this->integer()->unsigned()->notNull(),
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
        $this->dropTable('city');
    }
}
