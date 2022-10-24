<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductRecipe $model */

$this->title = 'Update Product Recipe: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
