<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%step_recipe}}`.
 */
class m221024_083559_create_step_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%step_recipe}}', [
            'id' => $this->primaryKey(),
            'step_number' => $this->tinyInteger()->notNull(),
            'content' => $this->text()->notNull(),
            'recipe_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%step_recipe}}');
    }
}
