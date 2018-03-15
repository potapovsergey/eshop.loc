<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.05.2017
 * Time: 16:03
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Characteristics;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ValuesCharacteristics */
/* @var $goods app\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <a href="<?= Url::to(['/admin/goods/create-characteristics','id' => $goods->id]) ?>" class="btn btn-info">Создать характеристику</a>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'characteristics_id')->dropDownList(ArrayHelper::map(Characteristics::find()->all(), 'id', 'title'),[
        'prompt' => 'Выберите значение'
    ]) ?>

    <?= $form->field($model, 'values')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <a href="<?= Url::to(['/admin/goods/view', 'id' => $goods->id]) ?>" class="btn btn-danger">Закончить Добавление</a>
</div>
