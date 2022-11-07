<?php

use common\models\PictureStepRecipe;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\StepRecipe $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Шаги рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="step-recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить шаг рецепта?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'step_number',
            'content:raw',
            [
                'attribute' => 'recipe_id',
                'value' => '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>',
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>

<div class="pictures-step-recipe">
    <h2><?= Html::encode('Картинки шага рецепта') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $pictureDataProvider,
        'columns' => [
            'id',
            'path_img:raw',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, PictureStepRecipe $model, $key, $index, $column) {
                    return Url::toRoute(['picture-step-recipe/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
