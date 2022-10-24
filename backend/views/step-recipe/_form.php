<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\StepRecipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="step-recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'step_number')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
