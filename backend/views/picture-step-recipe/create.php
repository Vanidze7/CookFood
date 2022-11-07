<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureStepRecipe $model */

$this->title = 'Создать картинку шага рецепта';
$this->params['breadcrumbs'][] = ['label' => 'Картинки шагов рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-step-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
