<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\CommentRecipe $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии рецептов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить коментарий?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:raw',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'recipe_id',
                'value' => '<a href="' . Url::to(['recipe/view', 'id' => $model->recipe->id]) . '">' . $model->recipe->id  . ' - ' . $model->recipe->title . '</a>',
                'format' => 'raw'
            ],
            [
                'attribute' => 'user_id',
                'value' => '<a href="' . Url::to(['user/view', 'id' => $model->user->id]) . '">' . $model->user->id . ' - ' . $model->user->username . '</a>',
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
