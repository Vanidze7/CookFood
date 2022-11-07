<?php

use common\models\PictureReview;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ReviewRecipe $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="review-recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить отзыв рецепта?',
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
            'like',
            'dislike',
            'views',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'user_id',
                'value' => $model->user->id . ' - ' . $model->user->username,
                'format' => 'raw'
            ],
            [
                'attribute' => 'recipe_id',
                'value' => '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>',
                'format' => 'raw'
            ]
        ],
    ]) ?>

</div>
<div class="picture-review">
    <h2><?= Html::encode('Картинки отзыва') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'path_img',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, PictureReview $model, $key, $index, $column) {
                    return Url::toRoute(['picture-review/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
