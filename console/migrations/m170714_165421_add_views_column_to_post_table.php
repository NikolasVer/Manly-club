<?php

use yii\db\Migration;

/**
 * Handles adding views to table `post`.
 */
class m170714_165421_add_views_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('post', 'views', $this->integer()->unsigned()->notNull()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('post', 'views');
    }
}
