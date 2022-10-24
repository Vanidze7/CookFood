<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $img
 * @property int|null $count_portions
 * @property int $time_cook
 * @property int|null $views
 * @property int|null $level
 * @property int|null $rating
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $cat_recipe_id
 * @property int $user_id
 *
 * @property CatRecipe $catRecipe
 * @property CommentRecipe[] $commentRecipes
 * @property Favourite[] $favourites
 * @property ProductRecipe[] $productRecipes
 * @property ReviewRecipe[] $reviewRecipes
 * @property StepRecipe[] $stepRecipes
 * @property User $user
 */
class Recipe extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    public function behaviors()
    {
        return ['class' => TimestampBehavior::class];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'time_cook', 'cat_recipe_id', 'user_id'], 'required'],
            [['content', 'img'], 'string'],
            [['file'], 'image'],
            [['count_portions', 'time_cook', 'views', 'level', 'rating', 'status', 'created_at', 'updated_at', 'cat_recipe_id', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['cat_recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatRecipe::class, 'targetAttribute' => ['cat_recipe_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'img' => 'Местоположение',
            'file' => 'Картинка',
            'count_portions' => 'Кол-во порций',
            'time_cook' => 'Время готовки',
            'views' => 'Просмотры',
            'level' => 'Сложность',
            'rating' => 'Рейтинг',
            'status' => 'Статус',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'cat_recipe_id' => 'Категория',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[CatRecipe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatRecipe()
    {
        return $this->hasOne(CatRecipe::class, ['id' => 'cat_recipe_id']);
    }

    /**
     * Gets query for [[CommentRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentRecipes()
    {
        return $this->hasMany(CommentRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[ProductRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductRecipes()
    {
        return $this->hasMany(ProductRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[ReviewRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewRecipes()
    {
        return $this->hasMany(ReviewRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[StepRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStepRecipes()
    {
        return $this->hasMany(StepRecipe::class, ['recipe_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
