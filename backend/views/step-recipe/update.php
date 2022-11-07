<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StepRecipe $model */

$this->title = 'Изменение шага рецепта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Шаги рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="step-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
