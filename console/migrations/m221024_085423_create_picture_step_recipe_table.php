<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%picture_step_recipe}}`.
 */
class m221024_085423_create_picture_step_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%picture_step_recipe}}', [
            'id' => $this->primaryKey(),
            'path_img' => $this->string()->notNull(),
            'step_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%picture_step_recipe}}');
    }
}
