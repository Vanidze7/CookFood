<?php

use common\models\CommentRecipe;
use common\models\Recipe;
use common\models\ReviewRecipe;
use common\models\User;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->id . ' - ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'content:raw',
            [
                'attribute' => 'role',
                'value' => User::$roleLabels[$model->role],
                'format' => 'raw'
            ],
            [
                'attribute' => 'status',
                'value' => User::$statusLabels[$model->status],
                'format' => 'raw'
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'avatar_img',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'verification_token',
        ],
    ]) ?>

</div>
<div class="user-recipe">
    <h2><?= Html::encode('Рецепты пользователя') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $recipeDataProvider,
        'columns' => [
            'id',
            'title',
            'content:raw',
            'views',
            [
                'attribute' => 'status',
                'value' => function(Recipe $model){
                    return Recipe::$statusLabels[$model->status];
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'cat_recipe_id',
                'value' => function(Recipe $model){
                    return '<a href="'. Url::to(['cat-recipe/view', 'id' => $model->catRecipe->id]) . '">' . $model->cat_recipe_id . ' - ' . $model->catRecipe->title . '</a>';
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

<div class="review-comment">

    <h2><?= Html::encode('Отзывы пользователя') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $reviewDataProvider,
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
            'views',
            'like',
            'dislike',
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
                    return Url::toRoute(['review-recipe/' .$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>

<div class="user-comment">

    <h2><?= Html::encode('Комментарии пользователя') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $commentDataProvider,
        'columns' => [
            'id',
            'content:raw',
            [
                'attribute' => 'recipe_id',
                'value' => function(CommentRecipe $model){
                    return '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, CommentRecipe $model, $key, $index, $column) {
                    return Url::toRoute(['comment-recipe/' .$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>