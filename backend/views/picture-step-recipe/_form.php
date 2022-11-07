<?php

use common\models\StepRecipe;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PictureStepRecipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="picture-step-recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' =>[
            'showCaption' => false,
            'showUpload' => false
        ]
    ]) ?>

    <?= $form->field($model, 'step_id')->dropDownList(StepRecipe::getStepList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
