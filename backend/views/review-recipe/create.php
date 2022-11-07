<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ReviewRecipe $model */

$this->title = 'Создание отзыва рецепта';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
