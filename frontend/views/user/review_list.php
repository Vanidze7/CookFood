<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/** @var common\models\ReviewRecipe $model */
?>
<br>
<div class="row recipe">
    <div class="col-2">
        <?= Html::img(Yii::$app->thumbnailer->get($model->recipe->path_img, 125)) ?>
    </div>
    <div class="col-10">
        <div class="row">
            <div class="col-6">
                <h3><?= Html::a($model->title, ['review/view', 'id' => $model->id]) ?></h3>
            </div>
            <div class="col-6">
                <span>(<?= Html::a($model->recipe->title, ['recipe/view', 'id' => $model->recipe->id]) ?>)</span>
            </div>
        </div>
        <div class="row">
            <?= HtmlPurifier::process($model->content) ?>
        </div>
        <div class="row">
            <div class="col-4">
                <span>Views: <?= $model->views ?></span>
            </div>
            <div class="col-4">
                <span>Like: <?= $model->like ?></span>
            </div>
            <div class="col-4">
                <span>Dislike: <?= $model->dislike ?></span>
            </div>
        </div>
    </div>
</div>
