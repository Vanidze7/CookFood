<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\PictureStepRecipe $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Картинки шагов рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="picture-step-recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить картинку шага рецепта?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'path_img',
            [
                'attribute' => 'step_id',
                'value' => '<a href="' . Url::to(['step-recipe/view', 'id' => $model->step->id]) . '">' . $model->step->id . '</a>' . '(' . $model->step->recipe->title . ')',
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
