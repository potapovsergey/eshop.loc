<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $dataProvider string */

$this->title = 'Ваш Заказ';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
?>
<div class="order-view">

    <?php if (Yii::$app->session->hasFlash('orderAccepted')): ?>
        <div class="alert alert-success">
            Ваш заказ был принят! Менеджер вскоре свяжется с вами!
        </div>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
            'phone',
            'address',
        ],
    ]) ?>

    <h2 class="profile_h">Заказанный товар</h2>
    <div class="profile_order_view">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model) {
                return $this->render('/main/order_profile',[
                    'model' => $model
                ]);
            },
        ]) ?>
    </div>

</div>
