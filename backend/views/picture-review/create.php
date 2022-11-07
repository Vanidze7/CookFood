<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureReview $model */

$this->title = 'Создать картинку отзыва';
$this->params['breadcrumbs'][] = ['label' => 'Картинки отзывов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
