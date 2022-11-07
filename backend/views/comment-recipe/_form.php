<?php

use common\models\Recipe;
use common\models\User;
use kartik\editors\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CommentRecipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->widget(Summernote::class, [
            'options' =>
                ['placeholder' => 'Напечатайте ваш комментарий...']
    ]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::getUserList()) ?>
    <?= $form->field($model, 'recipe_id')->dropDownList(Recipe::getRecipeList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
