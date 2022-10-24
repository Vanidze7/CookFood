<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favourite}}`.
 */
class m221024_084338_create_favourite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favourite}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'recipe_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%favourite}}');
    }
}
