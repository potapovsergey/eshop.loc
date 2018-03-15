<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 23:40
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model app\models\LoginForm
 * @var $form ActiveForm
 */
?>
<html lang="<?= Yii::$app->language ?>">
<div class="main-login container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username',['options' => [
        'id' => 'login-input',
        'class' => 'modal-sm'
    ]]) ?>
    <?= $form->field($model, 'password',['options' => [
        'id' => 'password-input',
        'class' => 'modal-sm'
    ]])->passwordInput() ?>
    <p>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </p>
    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- main-login -->
</html>