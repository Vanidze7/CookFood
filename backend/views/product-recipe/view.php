<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ProductRecipe $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Продукты рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить продукт рецепта?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'product_id',
                'value' => '<a href="' . Url::to(['product/view', 'id' => $model->product->id]) . '">' . $model->product->id . ' - ' . $model->product->title . '</a>',
                'format' => 'raw'
            ],
            'note',
            'count',
            [
                'attribute' => 'recipe_id',
                'value' => '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>',
                'format' => 'raw'
            ]
        ],
    ]) ?>

</div>
