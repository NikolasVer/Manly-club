<?php

use yii\db\Migration;

class m170608_170108_update_post_table extends Migration
{
    public function up()
    {
        $this->alterColumn('post', 'slug', $this->string()->notNull()->unique());
    }

    public function down()
    {
        $this->alterColumn('post', 'slug', $this->string()->notNull());
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
