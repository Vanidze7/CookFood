<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\PictureReview $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Картинки отзывов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="picture-review-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить картинку отзыва?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'path_img',
            [
                'attribute' => 'review_id',
                'value' => '<a href="' . Url::to(['review-recipe/view', 'id' => $model->review->id]) . '">' . $model->review->id . ' - ' . $model->review->title . '</a>',
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
