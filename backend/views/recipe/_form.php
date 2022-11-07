<?php

use common\models\CatRecipe;
use common\models\Recipe;
use common\models\User;
use kartik\editors\Summernote;
use kartik\number\NumberControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Recipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->widget(Summernote::class, [
            'options' => ['placeholder' => 'Описание рецепта']
    ]) ?>
    <?= $form->field($model, 'count_portions')->widget(NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 10,
                'rightAlign' => false
            ]
    ]) ?>
    <?= $form->field($model, 'time_cook')->widget(NumberControl::class, [
            'maskedInputOptions' => [
                'max' => 300,
                'rightAlign' => false
            ]
    ]) ?>
    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'level')->dropDownList(Recipe::$levelLabels) ?>

    <?= $form->field($model, 'rating')->textInput() //как замутить систему рейтинга ?>

    <?= $form->field($model, 'status')->dropDownList([Recipe::$statusLabels]) ?>

    <?= $form->field($model, 'cat_recipe_id')->dropDownList(CatRecipe::getCategoryList()) ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::getUserList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
