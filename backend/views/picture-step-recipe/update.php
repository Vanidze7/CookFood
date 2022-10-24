<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureStepRecipe $model */

$this->title = 'Update Picture Step Recipe: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Picture Step Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="picture-step-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
