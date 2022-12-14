<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_product".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 *
 * @property Product[] $products
 */
class CatProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_product';
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
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['cat_product_id' => 'id']);
    }

    public static function getCategoryList()
    {
        $arrays = self::find()->select(['id', 'title'])->orderBy('id')->all();
        return ArrayHelper::map($arrays, 'id', function ($row){
            return $row['id'] . ' - ' . $row['title'];
        });
    }
}
