<?php

use common\models\PictureReview;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Картинки отзывов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать картинку отзыва', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'path_img',
            [
                'attribute' => 'review_id',
                'value' => function(PictureReview $model){
                    return '<a href="' . Url::to(['review-recipe/view', 'id' => $model->review->id]) . '">' . $model->review->id . ' - ' . $model->review->title . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, PictureReview $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
