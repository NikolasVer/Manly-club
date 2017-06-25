<?php

use yii\db\Migration;

class m170622_231145_update_shop_category_table extends Migration
{

    public function safeUp()
    {
        $this->renameColumn('shop_category', 'name_extended', 'landing_name');
        $this->addColumn('shop_category', 'catalog_name', $this->string()->after('landing_name'));
        $this->addColumn('shop_category', 'show_in_landing', $this->boolean()->notNull()->defaultValue(0));
    }

    public function safeDown()
    {
        \yii\helpers\Console::output('Нельзя отменить');
        return FALSE;
    }
}
