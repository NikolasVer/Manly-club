<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_order`.
 */
class m170628_150509_create_shop_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_order', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->unsigned(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'city' => $this->string(),
            'street' => $this->string(),
            'house_number' => $this->string(),
            'apartment_number' => $this->string(),
            'np_number' => $this->string(),
            'comment' => $this->string(400),
            'cost_amount' => $this->float(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_order');
    }
}
