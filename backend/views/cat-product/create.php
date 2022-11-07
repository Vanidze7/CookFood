<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CatProduct $model */

$this->title = 'Создание категории продуктов';
$this->params['breadcrumbs'][] = ['label' => 'Категории продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
