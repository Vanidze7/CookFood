<?php

use common\models\Favourite;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Избранные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourite-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать избранное', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => function(Favourite $model){
                    return $model->user->id . ' - ' . $model->user->username;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'recipe_id',
                'value' => function(Favourite $model){
                    return '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id . ' - ' . $model->recipe->title . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Favourite $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
