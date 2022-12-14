<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_recipe".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 *
 * @property Recipe[] $recipes
 */
class CatRecipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'content' => 'Содержание',
        ];
    }

    /**
     * Gets query for [[Recipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::class, ['cat_recipe_id' => 'id']);
    }

    public static function getCategoryList()
    {
        $arrays = self::find()->select(['id', 'title'])->orderBy('id')->all();
        return ArrayHelper::map($arrays, 'id', function ($row){
            return $row['id'] . ' - ' . $row['title'];
        });
    }
}
