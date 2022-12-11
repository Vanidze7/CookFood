<?php

use common\models\Recipe;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/** @var common\models\Favourite $model */
?>
<br>
<div class="row recipe">
    <div class="col-2">
        <?= Html::img(Yii::$app->thumbnailer->get($model->recipe->path_img, 125)) ?>
    </div>
    <div class="col-10">
        <div class="row">
            <div class="col-6">
                <h3><?= Html::a($model->recipe->title, ['recipe/view', 'id' => $model->recipe->id]) ?></h3>
            </div>
            <div class="col-6">
                <span>(<?= Recipe::$statusLabels[$model->recipe->status] ?>)</span>
            </div>
        </div>
        <?= HtmlPurifier::process($model->recipe->content) ?>
        <?php foreach ($model->recipe->productRecipes as $productRecipe){?>
            <span>•<?= $productRecipe->product->title ?></span>
        <?php }  ?>
        <div class="row">
            <div class="col-4">
                <span>Кол-во порций: <?= $model->recipe->count_portions ?></span>
            </div>
            <div class="col-4">
                <span>Время готовки: <?= $model->recipe->time_cook ?> мин.</span>
            </div>
            <div class="col-4">
                <span>Просмотры: <?= $model->recipe->views ?></span>
            </div>
        </div>
    </div>
</div>
