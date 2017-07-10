<?php

use yii\db\Migration;

/**
 * Handles the creation of table `partner`.
 */
class m170709_154117_create_partner_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('partner', [
            'id' => $this->primaryKey()->unsigned(),
            'city_id' => $this->integer()->unsigned(),
            'name' => $this->string()->notNull(),
            'type' => $this->string(),
            'phones' => $this->string(),
            'site' => $this->string(),
            'address' => $this->string(),
            'img' => $this->string(),
            'gmap' => $this->string(50),
            'gmap_img' => $this->string(),
            'priority' => $this->smallInteger()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('partner');
    }
}
