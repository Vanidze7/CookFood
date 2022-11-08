<?php

use yii\db\Migration;

/**
 * Class m221107_172322_update_user_table
 */
class m221107_172322_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{user}}', 'content', $this->string());
        $this->addColumn('{{user}}', 'role', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'role');
        $this->dropColumn('{{%user}}', 'content');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221107_172322_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
