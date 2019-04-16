<?php

use yii\db\Migration;

/**
 * Class m190416_182545_add_alies_to_news
 */
class m190416_182545_add_alies_to_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'alias', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('news', 'alias');
    }
}
