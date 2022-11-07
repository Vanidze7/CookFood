<?php

use common\models\Recipe;
use kartik\editors\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\StepRecipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="step-recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'step_number')->textInput() //отредактировать проставление номера шага автоматически ?>

    <?= $form->field($model, 'content')->widget(Summernote::class, [
        'options' => ['placeholder' => 'Опишите шаг...']
    ]) ?>

    <?= $form->field($model, 'recipe_id')->dropDownList(Recipe::getRecipeList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
