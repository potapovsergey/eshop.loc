<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 0:38
 */

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;

/**
 * @var $content string
 * @var $this \yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

AppAsset::register($this);

$this->beginPage();
?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
<? $this->beginBody(); ?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'E-Shop',
            'brandUrl' => Yii::$app->homeUrl,
            'id' => 'main_nav',
            'options' => [
                'class' => '',
            ],
        ]);
        $session = Yii::$app->session;
        $cart_id = $session->get('cart.count');
        $menuItems = [
            [
                'label' => '<span class="glyphicon glyphicon-shopping-cart "></span><span class="badge badge-cart" id="badge_cart" >'. (int)$cart_id .'</span>',
                'options' => [
                    'class' => 'show-cart'
                ]
            ],
        ];
        if (Yii::$app->user->can('admin')):
            $menuItems = [
                [
                    'label' => '<span class="glyphicon glyphicon-alert text-danger"></span> Admin panel</span>',
                    'url' => ['admin/goods'],
                    'linkOptions' => ['data-method' => 'post']
                ],
            ];
        endif;
        Modal::begin([
            'header' => '<h3>Корзина</h3>',
            'id' => 'cart',
            'size' => 'modal-lg',
            'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                         <a href="'.Url::to(['/order/order','id' => false]).'" class="btn btn-success">Оформить заказ</a>
                         <button type="button" class="btn btn-danger clear-cart">Очистить корзину</button>'
        ]);
        Modal::end();

        Modal::begin([
            'header' => '<h3>Авторизация</h3>',
            'id' => 'log-in',
            'footer' => '<button type="button" class="btn btn-danger">Забыл пароль?</button>
                         <a class="btn btn-info btn-reg-on">Зарегистрироватся</a>'
        ]);
        Modal::end();

        if(Yii::$app->user->isGuest):
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-log-in"></span> Войти',
                'options' => [
                        'class' => 'btn-log-in'
                ]
            ];
        else:
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-user"></span>',
                'items' => [
                    '<li class="dropdown-header">'.Yii::$app->user->identity['username'].'</li>',
                    '<li class="divider"></li>',
                    [
                        'label' => '<span class="glyphicon glyphicon-user"></span> Профиль',
                        'url' => ['/profile/index'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
					[
                        'label' => '<span class="glyphicon glyphicon-log-out"></span> Выход',
                        'url' => ['/main/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]
            ];
        endif;
        echo Nav::widget([
            'items' => $menuItems,
            'encodeLabels' => false,
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ]
        ]);

        ActiveForm::begin(
            [
                'action' => ['/main/search'],
                'method' => 'get',
                'options' => [
                    'class' => 'navbar-form navbar-right'
                ]
            ]
        );
        echo '<div class="input-group input-group-sm">';
        echo Html::input(
            'type: text',
            'search',
            '',
            [
                'placeholder' => 'Поиск',
                'class' => 'form-control'
            ]
        );
        echo '<span class="input-group-btn">';
        echo Html::submitButton(
            '<span class="glyphicon glyphicon-search"></span>',
            [
                'class' => 'btn btn-info',
                'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_");'
            ]
        );
        echo '</span></div>';
        ActiveForm::end();
        NavBar::end();
        ?>
        <div class="container">
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<? $this->endBody(); ?>
</body>
</html>
<? $this->endPage(); ?>
