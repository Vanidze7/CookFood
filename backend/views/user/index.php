<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'username',
                'value' => function (User $model){
                    return '<a href="' . Url::to(['user/view', 'id' => $model->id]) . '">' . $model->id . ' - ' . $model->username . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'role',
                'value' => function (User $model){
                    return User::$roleLabels[$model->role];
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function (User $model){
                    return User::$statusLabels[$model->status];
                },
                'format' => 'raw'
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'avatar_img',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
