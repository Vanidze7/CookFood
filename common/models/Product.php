<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property int $cat_product_id
 *
 * @property CatProduct $catProduct
 * @property ProductRecipe[] $productRecipes
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'cat_product_id'], 'required'],
            [['cat_product_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['cat_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatProduct::class, 'targetAttribute' => ['cat_product_id' => 'id']],
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
            'cat_product_id' => 'Категория',
        ];
    }

    /**
     * Gets query for [[CatProduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatProduct()
    {
        return $this->hasOne(CatProduct::class, ['id' => 'cat_product_id']);
    }

    /**
     * Gets query for [[ProductRecipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductRecipes()
    {
        return $this->hasMany(ProductRecipe::class, ['product_id' => 'id']);
    }
    public static function getProductList()
    {
        $arrays = self::find()->select(['id', 'title'])->orderBy('id')->all();
        return ArrayHelper::map($arrays, 'id', function ($row){
            return $row['id'] . ' - ' . $row['title'];
        });
    }
}
