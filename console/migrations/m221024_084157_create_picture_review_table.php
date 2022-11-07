<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%picture_review}}`.
 */
class m221024_084157_create_picture_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%picture_review}}', [
            'id' => $this->primaryKey(),
            'path_img' => $this->string()->notNull(),
            'review_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%picture_review}}');
    }
}
