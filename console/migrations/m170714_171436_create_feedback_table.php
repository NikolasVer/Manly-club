<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedback`.
 */
class m170714_171436_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey()->unsigned(),
            'shop_product_id' => $this->integer()->unsigned(),
            'author_name' => $this->string(),
            'author_email' => $this->string(),
            'content' => $this->string(500)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feedback');
    }
}
