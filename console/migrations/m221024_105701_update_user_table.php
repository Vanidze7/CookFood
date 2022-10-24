<?php

use yii\db\Migration;

/**
 * Class m221024_105701_update_user_table
 */
class m221024_105701_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{user}}', 'avatar_img', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'avatar_img');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221024_105701_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
