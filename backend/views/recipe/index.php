<?php

use common\models\Recipe;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Рецепты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать рецепт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'content:raw',
            'views',
            'created_at:datetime',
            'updated_at:datetime',
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
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
