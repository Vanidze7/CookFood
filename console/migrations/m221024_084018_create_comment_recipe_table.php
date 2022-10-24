<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment_recipe}}`.
 */
class m221024_084018_create_comment_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment_recipe}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'recipe_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment_recipe}}');
    }
}
