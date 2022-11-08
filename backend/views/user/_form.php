<?php

use common\models\User;
use kartik\editors\Summernote;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['max' => 16]) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'content')->widget(Summernote::class, [
            'options' => ['placeholder' => 'Напишите о себе']
    ]) ?>
    <?= $form->field($model, 'file')->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' =>[
                'showCaption' => false,
                'showUpload' => false
            ]
    ]) ?>
    <?= $form->field($model, 'role')->dropDownList(User::$roleLabels) ?>
    <?= $form->field($model, 'status')->dropDownList(User::$statusLabels) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
