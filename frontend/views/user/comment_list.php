<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/** @var common\models\CommentRecipe $model */
?>
<br>
<div class="row recipe">
    <div class="col-2">
        <?= Html::img(Yii::$app->thumbnailer->get($model->recipe->path_img, 125)) ?>
    </div>
    <div class="col-10">
        <div class="row">
            <h3>Рецепт: <?= Html::a($model->recipe->title, ['recipe/view', 'id' => $model->recipe->id]) ?></h3>
            <?= HtmlPurifier::process($model->content) ?>
        </div>
        <div class="row">
            <div class="col-6">
                <span>Опубликован: <?= date ('Y-m-d', $model->created_at) ?></span>
            </div>
            <?php if ($model->created_at != $model->updated_at) { ?>
            <div class="col-6">
                <span>Изменен: <?= $model->updated_at ?></span>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
