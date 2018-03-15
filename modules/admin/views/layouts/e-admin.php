<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.05.2017
 * Time: 16:31
 */

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
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
        'brandLabel' => 'E-Shop-Admin',
        'brandUrl' => ['/admin/goods'],
        'id' => 'nav-admin',
        'options' => [
            'class' => '',
        ],
    ]);
    $menuItems[] = [
        'label' => 'На сайт',
		'url' => ['/main/index']
    ];
	$menuItems[] = [
        'label' => 'Выход',
		'url' => ['/admin/default/logout']
    ];
    echo Nav::widget([
        'items' => $menuItems,
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ]
    ]);
    NavBar::end();
    ?>
    <div class="">
		<div class="block_table">
			<div class="block-admin-table-head">
				<span class="text-admin-head">Таблицы</span>
			</div>
			<div class="block-admin-table-body">
				<?php echo Html::a('Товары',['/admin/goods'],['class'=>'btn btn-admin-table']) ?><br>
				<?php echo Html::a('Заказы',['/admin/order'],['class'=>'btn btn-admin-table']) ?><br>
				<?php echo Html::a('Заказанный товар',['/admin/order-goods'],['class'=>'btn btn-admin-table']) ?><br>
			</div>
		</div>
		<div class="block-admin-content">
			<?= $content ?>
		</div>
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
