<?php

use yii\db\Migration;

class m170617_163651_update_shop_category_table extends Migration
{
    public function up()
    {
        $this->addColumn('shop_category', 'name_extended', $this->string()->after('name'));
        $this->addColumn('shop_category', 'description', $this->string(500)->after('name_extended'));
    }

    public function down()
    {
        $this->dropColumn('shop_category', 'name_extended');
        $this->dropColumn('shop_category', 'description');
    }
}
