<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model \app\models\Order */

$this->title = 'Orders';
$session = Yii::$app->session;
?>
<div class="order-index">

    <p>
        <?php echo $this->render('/cart/cart_view', compact('session')); ?>
    </p>
    <?php if ($session['cart'] != NULL): ?>
        <?php if (Yii::$app->user->isGuest):?>
            <?php $form = ActiveForm::begin([
                'action' => ['/order/order', 'id' => false],
                'method' => 'post',
            ]); ?>

            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Заказать', ['class' => 'btn btn-warning order-goods']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        <?php else: ?>
            <?= Html::a('Заказать',['/order/order', 'id' => true], ['class' => 'btn btn-warning']); ?>
        <?php endif;?>
    <?php endif; ?>
</div>
