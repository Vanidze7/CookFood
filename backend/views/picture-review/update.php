<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureReview $model */

$this->title = 'Update Picture Review: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Picture Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="picture-review-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
