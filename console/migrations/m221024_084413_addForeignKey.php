<?php

use yii\db\Migration;

/**
 * Class m221024_084413_addForeignKey
 */
class m221024_084413_addForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //имя информационное, текущая таблица, ее столбик, связываемая таблица, ее столбик, постоянные значения
        $this->addForeignKey('fk_product_to_cat_product', '{{%product}}', 'cat_product_id', '{{%cat_product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_recipe_to_cat_recipe', '{{%recipe}}', 'cat_recipe_id', '{{%cat_recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_recipe_to_user', '{{%recipe}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_step_recipe_to_recipe', '{{%step_recipe}}', 'recipe_id', '{{%recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_product_recipe_to_recipe', '{{%product_recipe}}', 'recipe_id', '{{%recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_product_recipe_to_product', '{{%product_recipe}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_picture_step_recipe_to_step_recipe', '{{%picture_step_recipe}}', 'step_id', '{{%step_recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_comment_recipe_to_user', '{{%comment_recipe}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_comment_recipe_to_recipe', '{{%comment_recipe}}', 'recipe_id', '{{%recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_review_recipe_to_recipe', '{{%review_recipe}}', 'recipe_id', '{{%recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_review_recipe_to_user', '{{%review_recipe}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_picture_review_to_review_recipe', '{{%picture_review}}', 'review_id', '{{%review_recipe}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_favourite_to_user', '{{%favourite}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_favourite_to_recipe', '{{%favourite}}', 'recipe_id', '{{%recipe}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_to_cat_product', '{{%product}}');
        $this->dropForeignKey('fk_recipe_to_cat_recipe', '{{%recipe}}');
        $this->dropForeignKey('fk_recipe_to_user', '{{%recipe}}');
        $this->dropForeignKey('fk_step_recipe_to_recipe', '{{%step_recipe}}');
        $this->dropForeignKey('fk_product_recipe_to_recipe', '{{%product_recipe}}');
        $this->dropForeignKey('fk_product_recipe_to_product', '{{%product_recipe}}');
        $this->dropForeignKey('fk_picture_step_recipe_to_step_recipe', '{{%picture_step_recipe}}');
        $this->dropForeignKey('fk_comment_recipe_to_user', '{{%comment_recipe}}');
        $this->dropForeignKey('fk_comment_recipe_to_recipe', '{{%comment_recipe}}');
        $this->dropForeignKey('fk_review_recipe_to_recipe', '{{%review_recipe}}');
        $this->dropForeignKey('fk_review_recipe_to_user', '{{%review_recipe}}');
        $this->dropForeignKey('fk_picture_review_to_review_recipe', '{{%picture_review}}');
        $this->dropForeignKey('fk_favourite_to_user', '{{%favourite}}');
        $this->dropForeignKey('fk_favourite_to_recipe', '{{%favourite}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221024_084413_addForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
