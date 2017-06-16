<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_product_variety_attachment`.
 */
class m170613_085039_create_shop_product_variety_attachment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_product_variety_attachment', [
            'id' => $this->primaryKey()->unsigned(),
            'shop_product_variety_id' => $this->integer()->unsigned()->notNull(),
            'type' => $this->smallInteger()->unsigned()->notNull(),
            'url_local' => $this->string(),
            'url_remote' => $this->string(),
            'priority' => $this->smallInteger()->unsigned()->notNull()->defaultValue(0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_product_variety_attachment');
    }
}
