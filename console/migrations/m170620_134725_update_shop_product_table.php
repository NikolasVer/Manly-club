<?php

use yii\db\Migration;

class m170620_134725_update_shop_product_table extends Migration
{
    public function up()
    {
        $this->addColumn('shop_product', 'short_name', $this->string()->after('name'));
    }

    public function down()
    {
        $this->dropColumn('shop_product', 'short_name');
    }
}
