<?php

use common\models\Product;
use common\models\Recipe;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ProductRecipe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(Product::getProductList()) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_id')->dropDownList(Recipe::getRecipeList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
