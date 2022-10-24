<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cat_recipe}}`.
 */
class m221024_083407_create_cat_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cat_recipe}}', [
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
        $this->dropTable('{{%cat_recipe}}');
    }
}
