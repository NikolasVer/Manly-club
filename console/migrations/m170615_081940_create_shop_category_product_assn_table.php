<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_category_product_assn`.
 */
class m170615_081940_create_shop_category_product_assn_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_category_product_assn', [
            'id' => $this->primaryKey()->unsigned(),
            'shop_category_id' => $this->integer()->unsigned()->notNull(),
            'shop_product_id' => $this->integer()->unsigned()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_category_product_assn');
    }
}
