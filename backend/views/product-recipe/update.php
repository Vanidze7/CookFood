<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductRecipe $model */

$this->title = 'Изменение продукта рецепта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Продукты рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="product-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
