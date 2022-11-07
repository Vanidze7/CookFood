<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CatRecipe $model */

$this->title = 'Изменение кат. рецепта: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Кат. рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение кат. рецепта';
?>
<div class="cat-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
