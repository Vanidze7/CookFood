<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CatRecipe $model */

$this->title = 'Update Cat Recipe: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cat Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>