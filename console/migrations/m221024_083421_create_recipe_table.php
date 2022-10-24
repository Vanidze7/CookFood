<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recipe}}`.
 */
class m221024_083421_create_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'img' => $this->string(),
            'count_portions' => $this->tinyInteger(),
            'time_cook' => $this->integer()->notNull(),
            'views' => $this->integer()->unsigned()->defaultValue(0),
            'level' => $this->tinyInteger()->defaultValue(0),
            'rating' => $this->integer()->defaultValue(0),//верен ли тип данных?
            'status' => $this->tinyInteger(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'cat_recipe_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recipe}}');
    }
}
