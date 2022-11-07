<?php

use common\models\Recipe;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Favourite $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="favourite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::getUserList()) ?>
    <?= $form->field($model, 'recipe_id')->dropDownList(Recipe::getRecipeList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
