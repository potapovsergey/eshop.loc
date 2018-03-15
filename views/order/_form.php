<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name') ?>
    <?= $form->field($model, 'last_name') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-warning order-goods']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
