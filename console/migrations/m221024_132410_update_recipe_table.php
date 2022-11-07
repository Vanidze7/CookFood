<?php

use yii\db\Migration;

/**
 * Class m221024_132410_update_recipe_table
 */
class m221024_132410_update_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{recipe}}', 'path_img', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221024_132410_update_recipe_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221024_132410_update_recipe_table cannot be reverted.\n";

        return false;
    }
    */
}
