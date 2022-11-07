<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CommentRecipe $model */

$this->title = 'Изменение комментария рецепта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение комментария рецепта';
?>
<div class="comment-recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
