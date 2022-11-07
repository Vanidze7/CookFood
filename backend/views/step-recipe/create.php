<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StepRecipe $model */

$this->title = 'Создание шага рецепта';
$this->params['breadcrumbs'][] = ['label' => 'Шаги рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="step-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
