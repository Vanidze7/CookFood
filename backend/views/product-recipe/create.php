<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductRecipe $model */

$this->title = 'Create Product Recipe';
$this->params['breadcrumbs'][] = ['label' => 'Product Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
