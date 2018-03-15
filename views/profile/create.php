<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Создание профиля';
$session = Yii::$app->session;
?>
<div class="profile-create">

    <?php if (Yii::$app->session->hasFlash('registerSuccess')): ?>
        <div class="alert alert-success">
            Регистрация прошла успешно! Теперь вам необходимо заполнить свой профиль!
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('createProfile')): ?>
        <div class="alert alert-danger">
            Чтобы посмотреть профиль - его необходимо создать!
        </div>
    <?php endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
