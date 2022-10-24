<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "review_recipe".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int|null $like
 * @property int|null $dislike
 * @property int|null $views
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 * @property int $recipe_id
 *
 * @property PictureReview[] $pictureReviews
 * @property Recipe $recipe
 * @property User $user
 */
class ReviewRecipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_recipe';
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
            [['title', 'content', 'user_id', 'recipe_id'], 'required'],
            [['content'], 'string'],
            [['like', 'dislike', 'views', 'created_at', 'updated_at', 'user_id', 'recipe_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::class, 'targetAttribute' => ['recipe_id' => 'id']],
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
            'like' => 'Нравится',
            'dislike' => 'Не нравится',
            'views' => 'Просмотры',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'user_id' => 'Пользователь',
            'recipe_id' => 'Рецепт',
        ];
    }

    /**
     * Gets query for [[PictureReviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPictureReviews()
    {
        return $this->hasMany(PictureReview::class, ['review_id' => 'id']);
    }

    /**
     * Gets query for [[Recipe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipe::class, ['id' => 'recipe_id']);
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
