<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_product`.
 */
class m170613_083626_create_shop_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_product', [
            'id' => $this->primaryKey()->unsigned(),
            'shop_faq_id' => $this->integer()->unsigned(),
            'name' => $this->string()->notNull(),
            'description_cut' => $this->text(),
            'description_full' => $this->text(),
            'slug' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_product');
    }
}
