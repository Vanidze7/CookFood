<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "picture_review".
 *
 * @property int $id
 * @property string $path
 * @property int $review_id
 *
 * @property ReviewRecipe $review
 */
class PictureReview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'review_id'], 'required'],
            [['review_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['review_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewRecipe::class, 'targetAttribute' => ['review_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Местоположение',
            'review_id' => 'Отзыв',
        ];
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(ReviewRecipe::class, ['id' => 'review_id']);
    }
}
