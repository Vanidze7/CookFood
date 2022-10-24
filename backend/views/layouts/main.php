<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name = 'Главная',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems [] = ['label' => 'Login', 'url' => ['/site/login']];
    }else{
        $menuItems [] = [
                'label' => 'Рецепты',
                'items' => [
                    ['label' => 'Рецепты', 'url' => ['/recipe/index']],
                    ['label' => 'Кат. рецептов', 'url' => ['/cat-recipe/index']],
                    ['label' => 'Продукты рецептов', 'url' => ['/product-recipe/index']],
                    ['label' => 'Шаги рецептов', 'url' => ['/step-recipe/index']],
                    ['label' => 'Картинки шагов рец.', 'url' => ['/picture-step-recipe/index']],
                    ['label' => 'Комментарии', 'url' => ['/comment-recipe/index']],
                    ['label' => 'Избранные', 'url' => ['/favourite/index']]
                ]
            ];
        $menuItems [] = [
                'label' => 'Продукты',
                'items' => [
                    ['label' => 'Продукты', 'url' => ['/product/index']],
                    ['label' => 'Кат. продуктов', 'url' => ['/cat-product/index']],
                ]
            ];
        $menuItems [] = [
                'label' => 'Отзывы',
                'items' => [
                    ['label' => 'Отзывы', 'url' => ['/review-recipe/index']],
                    ['label' => 'Картинки отзывов', 'url' => ['/picture-review/index']],
            ]
        ];
        $menuItems [] = Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
