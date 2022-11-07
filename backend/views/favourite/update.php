<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Favourite $model */

$this->title = 'Изменить избранное: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Избранные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="favourite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
