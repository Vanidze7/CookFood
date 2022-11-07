<?php

use common\models\ReviewRecipe;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PictureReview $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="picture-review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_id')->dropDownList(ReviewRecipe::getReviewList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
