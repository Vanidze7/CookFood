<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CommentRecipe $model */

$this->title = 'Создать комментарий рецепта';
$this->params['breadcrumbs'][] = ['label' => 'Комментарии рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-recipe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
