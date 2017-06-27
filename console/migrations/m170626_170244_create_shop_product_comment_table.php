<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_product_comment`.
 */
class m170626_170244_create_shop_product_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_product_comment', [
            'id' => $this->primaryKey()->unsigned(),
            'parent_id' => $this->integer()->unsigned(),
            'shop_product_id' => $this->integer()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned(),
            'author_name' => $this->string(),
            'author_email' => $this->string(),
            'content' => $this->text()->notNull()->defaultValue(''),
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
        $this->dropTable('shop_product_comment');
    }
}
