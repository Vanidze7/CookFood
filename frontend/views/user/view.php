<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var common\models\Recipe $user_recipe */
/** @var common\models\ReviewRecipe $user_review */
/** @var common\models\CommentRecipe $user_comment */
/** @var common\models\Favourite $user_favourite */
/** @var integer $count_recipe */
/** @var integer $count_review */
/** @var integer $count_comment */
/** @var integer $count_favourite */

$this->title = 'Профиль пользователя: ' . $model->username;

?>
<div class="user-view">
    <div class="row">
        <div class="col-2 offset-1">
            <?= Html::img($model->avatar_img, ['width' => '100%']) ?>
        </div>
        <div class="col-4">
            <h3><?= $model->username ?></h3>
            <div>Дата регистрации: <?= \Yii::$app->formatter->asDate($model->created_at, 'Y-m-d') ?></div>
            <div>Почта: <?= $model->email ?></div>
            <div>Звание: <?= User::$roleLabels[$model->role] ?></div>
            <?php
            if (Yii::$app->user->identity->id == $model->id){
            ?>
            <div><?= Html::a('Редактировать профиль', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></div>
            <?php } ?>
        </div>
        <div class="col-4">
            <div><?= $model->content ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="recipe-tab" data-bs-toggle="tab" data-bs-target="#recipe-tab-pane" type="button" role="tab" aria-controls="recipe-tab-pane" aria-selected="true">
                        Ваши рецепты (<?= $count_recipe ?>)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="favourite-tab" data-bs-toggle="tab" data-bs-target="#favourite-tab-pane" type="button" role="tab" aria-controls="favourite-tab-pane" aria-selected="false">
                        Избранное (<?= $count_favourite ?>)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review-tab-pane" type="button" role="tab" aria-controls="review-tab-pane" aria-selected="false">
                        Отзывы (<?= $count_review ?>)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment-tab-pane" type="button" role="tab" aria-controls="comment-tab-pane" aria-selected="false">
                        Комментарии (<?= $count_comment ?>)
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="recipe-tab-pane" role="tabpanel" aria-labelledby="recipe-tab" tabindex="0">
                    <?= ListView::widget([
                        'dataProvider' => $user_recipe,
                        'itemView' => 'recipe_list',
                        'summary' => "",
                    ]);
                    ?>
                </div>
                <div class="tab-pane fade" id="favourite-tab-pane" role="tabpanel" aria-labelledby="favourite-tab" tabindex="0">
                    <?= ListView::widget([
                        'dataProvider' => $user_favourite,
                        'itemView' => 'favourite_list',
                        'summary' => "",
                    ]);
                    ?>
                </div>
                <div class="tab-pane fade" id="review-tab-pane" role="tabpanel" aria-labelledby="review-tab" tabindex="0">
                    <?= ListView::widget([
                        'dataProvider' => $user_review,
                        'itemView' => 'review_list',
                        'summary' => "",
                    ]);
                    ?>
                </div>
                <div class="tab-pane fade" id="comment-tab-pane" role="tabpanel" aria-labelledby="comment-tab" tabindex="0">
                    <?= ListView::widget([
                        'dataProvider' => $user_comment,
                        'itemView' => 'comment_list',
                        'summary' => "",
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
