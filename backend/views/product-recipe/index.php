<?php

use common\models\ProductRecipe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты рецептов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продукт рецепта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'product_id',
                'value' => function (ProductRecipe $model){
                    return '<a href="' . Url::to(['product/view', 'id' => $model->product->id]) . '">' . $model->product->id . ' - ' . $model->product->title . '</a>';
                },
                'format' => 'raw'
            ],
            'note',
            'count',
            [
                'attribute' => 'recipe_id',
                'value' => function (ProductRecipe $model){
                    return '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ProductRecipe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
