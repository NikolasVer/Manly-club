<?php

use yii\db\Migration;

class m170701_142945_update_user_table extends Migration
{

    public function safeUp()
    {
        $this->addColumn('user', 'firstname', $this->string());
        $this->addColumn('user', 'lastname', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('user', 'firstname');
        $this->dropColumn('user', 'lastname');
    }
}
