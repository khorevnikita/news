<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m190416_175217_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'activity'=>$this->boolean()->defaultValue(0),
            'date'=>$this->timestamp()->null(),
            'name'=>$this->string()->null(),
            'description'=>$this->text()->null(),
            'content'=>$this->text()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}
