<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m170530_133030_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull()->defaultValue(''),
            'excerpt' => $this->text()->notNull()->defaultValue(''),
            'content' => $this->text()->notNull()->defaultValue(''),
            'image' => $this->string(),
            'image_preview' => $this->string(),
            'display_type' => $this->smallInteger()->notNull()->defaultValue(1),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'slug' => $this->string()->notNull(),
            'publish_at' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
