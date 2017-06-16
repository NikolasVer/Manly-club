<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_product_variety`.
 */
class m170613_084341_create_shop_product_variety_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_product_variety', [
            'id' => $this->primaryKey()->unsigned(),
            'shop_product_id' => $this->integer()->unsigned()->notNull(),
            'code' => $this->string(20)->notNull(),
            'volume' => $this->float()->notNull(),
            'cost' => $this->float()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_product_variety');
    }
}
