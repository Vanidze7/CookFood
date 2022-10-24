<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cat_product}}`.
 */
class m221024_083223_create_cat_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cat_product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cat_product}}');
    }
}
