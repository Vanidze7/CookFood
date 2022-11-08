<?php

use common\models\Recipe;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\CatRecipe $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Кат. рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить выбранную кат. рецептов?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content',
        ],
    ]) ?>

</div>

<div class="cat-recipe">

    <h2><?= Html::encode('Рецепты категории') ?></h2>

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
                'attribute' => 'user_id',
                'value' => function(Recipe $model){
                    return '<a href="' . Url::to(['user/view', 'id' => $model->user->id]) . '">' . $model->user->id . ' - ' . $model->user->username . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Recipe $model, $key, $index, $column) {
                    return Url::toRoute(['recipe/' .$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>