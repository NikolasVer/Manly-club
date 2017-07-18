<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_commnet`.
 */
class m170714_163712_create_post_commnet_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_comment', [
            'id' => $this->primaryKey()->unsigned(),
            'parent_id' => $this->integer()->unsigned(),
            'post_id' => $this->integer()->unsigned()->notNull(),
            'user_id' => $this->integer()->unsigned(),
            'author_name' => $this->string(),
            'author_email' => $this->string(),
            'content' => $this->text()->notNull(),
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
        $this->dropTable('post_comment');
    }
}
