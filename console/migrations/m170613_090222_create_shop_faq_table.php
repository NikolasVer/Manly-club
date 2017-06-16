<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_faq`.
 */
class m170613_090222_create_shop_faq_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_faq', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_faq');
    }
}
