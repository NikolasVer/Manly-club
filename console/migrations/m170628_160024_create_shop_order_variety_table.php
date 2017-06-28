<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_order_variety`.
 */
class m170628_160024_create_shop_order_variety_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_order_variety_assn', [
            'id' => $this->primaryKey()->unsigned(),
            'shop_order_id' => $this->integer()->unsigned()->notNull(),
            'shop_product_variety_id' => $this->integer()->unsigned()->notNull(),
            'amount' => $this->smallInteger()->notNull()->defaultValue(1)->unsigned()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_order_variety_assn');
    }
}
