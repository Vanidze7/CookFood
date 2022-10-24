<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureStepRecipe $model */

$this->title = 'Create Picture Step Recipe';
$this->params['breadcrumbs'][] = ['label' => 'Picture Step Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-step-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
