<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CommentRecipe $model */

$this->title = 'Create Comment Recipe';
$this->params['breadcrumbs'][] = ['label' => 'Comment Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
