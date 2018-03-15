<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 16:22
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model app\models\LoginForm
 * @var $form ActiveForm
 */
//Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
//    'css' => [],
//];
//$this->registerCssFile('@web/css/materialize.css');

?>
<div class="main-login container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <p>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </p>
    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
        <a class="btn btn-info btn-reg-on">Зарегистрироватся</a>
    </div>
    <?php ActiveForm::end(); ?>

    <?= Html::a('Забыли пароль?', ['/main/send-email']) ?>
</div><!-- main-login -->