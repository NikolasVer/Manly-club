<?php

use yii\db\Migration;

class m170625_215227_update_shop_product_variety_table extends Migration
{


    public function safeUp()
    {

        $this->alterColumn('shop_product_variety', 'volume', $this->string(100)->notNull());
        $this->addColumn('shop_product_variety', 'priority', $this->smallInteger()->notNull()->defaultValue(0));

    }

    public function safeDown()
    {
        $this->alterColumn('shop_product_variety', 'volume', $this->float());
        $this->dropColumn('shop_product_variety', 'priority');
    }
}
