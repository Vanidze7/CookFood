<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review_recipe}}`.
 */
class m221024_084052_create_review_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review_recipe}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'like' => $this->integer()->defaultValue(0),
            'dislike' => $this->integer()->defaultValue(0),
            'views' => $this->integer()->unsigned()->defaultValue(0),
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
        $this->dropTable('{{%review_recipe}}');
    }
}
