<?php

use common\models\Recipe;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/** @var common\models\Recipe $model */
?>
<br>
<div class="row recipe">
    <div class="col-2">
        <?= Html::img(Yii::$app->thumbnailer->get($model->path_img, 125)) ?>
    </div>
    <div class="col-10">
        <div class="row">
            <div class="col-6">
                <h3><?= Html::a($model->title, ['recipe/view', 'id' => $model->id]) ?></h3>
            </div>
            <div class="col-6">
                <span>(<?= Recipe::$statusLabels[$model->status] ?>)</span>
            </div>
        </div>
        <?= HtmlPurifier::process($model->content) ?>
        <?php foreach ($model->productRecipes as $productRecipe){?>
            <span>•<?= $productRecipe->product->title ?></span>
        <?php }  ?>
        <div class="row">
            <div class="col-4">
                <span>Кол-во порций: <?= $model->count_portions ?></span>
            </div>
            <div class="col-4">
                <span>Время готовки: <?= $model->time_cook ?> мин.</span>
            </div>
            <div class="col-4">
                <span>Просмотры: <?= $model->views ?></span>
            </div>
        </div>
    </div>
</div>
