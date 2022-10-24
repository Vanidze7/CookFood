<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\StepRecipe $model */

$this->title = 'Create Step Recipe';
$this->params['breadcrumbs'][] = ['label' => 'Step Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="step-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
