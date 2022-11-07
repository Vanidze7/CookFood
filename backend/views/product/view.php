<?php

use common\models\Recipe;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить продукт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'cat_product_id',
                'value' => '<a href="' . Url::to(['cat-product/view', 'id' => $model->catProduct->id]) . '">' . $model->catProduct->id . ' - ' . $model->catProduct->title . '</a>',
                'format' => 'raw'
            ]
        ],
    ]) ?>

</div>

<div class="recipe">
    <h2><?= Html::encode('Рецепты продукта') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $recipeDataProvider,
        'columns' => [
            'id',
            'title',
            'content:raw',
            [
                'attribute' => 'cat_recipe_id',
                'value' => function(Recipe $model){
                    return '<a href="'. Url::to(['cat-recipe/view', 'id' => $model->catRecipe->id]) . '">' . $model->cat_recipe_id . ' - ' . $model->catRecipe->title . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'user_id',
                'value' => function(Recipe $model){
                    return $model->user->id . ' - ' . $model->user->username;
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Recipe $model, $key, $index, $column) {
                    return Url::toRoute(['recipe/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
