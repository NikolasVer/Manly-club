<?php

use yii\db\Migration;

class m170611_104052_update_shop_category_table extends Migration
{
    public function up()
    {
        $this->addColumn('shop_category', 'slug', $this->string()->notNull()->unique());
    }

    public function down()
    {
        $this->dropColumn('shop_category', 'slug');
    }

}
