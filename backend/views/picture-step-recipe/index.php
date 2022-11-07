<?php

use common\models\PictureStepRecipe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Картинки шагов рецептов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-step-recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать картинку шага рецепта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'path_img:raw',
            [
                'attribute' => 'step_id',
                'value' => function (PictureStepRecipe $model){
                    return '<a href="' . Url::to(['step-recipe/view', 'id' => $model->step->id]) . '">' . $model->step->id . '</a>' . '(' . $model->step->recipe->title . ')';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, PictureStepRecipe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
