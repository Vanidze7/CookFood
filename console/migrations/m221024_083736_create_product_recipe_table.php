<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_recipe}}`.
 */
class m221024_083736_create_product_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_recipe}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'note' => $this->string(),
            'count' => $this->string()->notNull(),
            'recipe_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_recipe}}');
    }
}
