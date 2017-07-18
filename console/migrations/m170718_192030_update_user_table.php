<?php

use yii\db\Migration;

class m170718_192030_update_user_table extends Migration
{
    public function safeUp()
    {

        $this->dropIndex('username', 'user');
        $this->alterColumn('user', 'username', $this->string());

    }

    public function safeDown()
    {
        $this->alterColumn('user', 'username', $this->string()->notNull());
        $this->createIndex('username', 'user', 'username', TRUE);
    }
}
