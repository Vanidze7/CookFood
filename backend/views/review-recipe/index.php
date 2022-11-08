<?php

use common\models\ReviewRecipe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отзывы рецептов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать отзыв рецепта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'content',
                'value' => function(ReviewRecipe $model){
                    return substr($model->content, 0, 100);
                },
                'format' => 'raw'
            ],
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'user_id',
                'value' => function(ReviewRecipe $model){
                    return '<a href="' . Url::to(['user/view', 'id' => $model->user->id]) . '">' . $model->user->id . ' - ' . $model->user->username . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'recipe_id',
                'value' => function(ReviewRecipe $model){
                    return '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ReviewRecipe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
