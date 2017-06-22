<?php

use yii\db\Migration;

/**
 * Handles adding label to table `shop_product`.
 */
class m170622_075620_add_label_column_to_shop_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('shop_product', 'label', $this->string(100)->after('short_name'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('shop_product', 'label');
    }
}
