<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureReview $model */

$this->title = 'Изменение картинки отзыва: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Картинки отзывов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="picture-review-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
