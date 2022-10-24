<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PictureReview $model */

$this->title = 'Create Picture Review';
$this->params['breadcrumbs'][] = ['label' => 'Picture Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
