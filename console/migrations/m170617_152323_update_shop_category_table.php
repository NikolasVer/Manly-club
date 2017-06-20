<?php

use yii\db\Migration;

class m170617_152323_update_shop_category_table extends Migration
{
    public function up()
    {
        $this->addColumn('shop_category', 'image', $this->string());
    }

    public function down()
    {
        $this->dropColumn('shop_category', 'image');
        return false;
    }
}
