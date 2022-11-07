<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureStepRecipe $model */

$this->title = 'Изменение картинки шага рецепта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Картинки шагов рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="picture-step-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
