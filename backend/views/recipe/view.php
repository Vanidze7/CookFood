<?php

use common\models\PictureStepRecipe;
use common\models\ProductRecipe;
use common\models\Recipe;
use common\models\StepRecipe;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Recipe $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рецепты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить рецепт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:raw',
            [
                'attribute' => 'path_img',
                'value' => $model->path_img,
                'format' => 'raw'
            ],
            'count_portions',
            'time_cook',
            'views',
            [
                'attribute' => 'level',
                'value' => Recipe::$levelLabels[$model->level],
                'format' => 'raw'
            ],
            'rating',
            [
                'attribute' => 'status',
                'value' => Recipe::$statusLabels[$model->status],
                'format' => 'raw'
            ],
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'cat_recipe_id',
                'value' => '<a href="'. Url::to(['cat-recipe/view', 'id' => $model->catRecipe->id]) . '">' . $model->cat_recipe_id . ' - ' . $model->catRecipe->title . '</a>',
                'format' => 'raw'
            ],
            [
                'attribute' => 'user_id',
                'value' => '<a href="' . Url::to(['user/view', 'id' => $model->user->id]) . '">' . $model->user->id . ' - ' . $model->user->username . '</a>',
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
<div class="product-recipe">
    <h2><?= Html::encode('Продукты рецепта') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $productDataProvider,
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
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ProductRecipe $model, $key, $index, $column) {
                    return Url::toRoute(['product-recipe/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>

<div class="step-recipe">
    <h2><?= Html::encode('Шаги рецепта') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $stepDataProvider,
        'columns' => [
            'id',
            'step_number',
            'content:raw',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, StepRecipe $model, $key, $index, $column) {
                    return Url::toRoute(['step-recipe/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>

<div class="picture-step-recipe">
    <h2><?= Html::encode('Картинки шагов рецепта') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $pictureStepDataProvider,
        'columns' => [
            'id',
            'path_img',
            'step_id',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, PictureStepRecipe $model, $key, $index, $column) {
                    return Url::toRoute(['picture-step-recipe/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
