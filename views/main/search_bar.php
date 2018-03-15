<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 1:29
 */

//use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use app\models\Category;
use kartik\form\ActiveForm;
use kartik\range\RangeInput;
use yii\widgets\Pjax;
use kartik\slider\Slider;
use app\models\Manufactory;


/* @var $this yii\web\View */
/* @var $model app\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="goods-search goods_search_bar">

    <?php Pjax::begin(); ?><?php $form = ActiveForm::begin([
        'id' => 'login-form-inline',
        'type' => ActiveForm::TYPE_INLINE,
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'title'),[
        'prompt' => 'Выберите категорию',
        //'class' => 'btn-info'
    ]) ?>
    <?= $form->field($model, 'manufactory_id')->dropDownList(ArrayHelper::map(Manufactory::find()->all(), 'id', 'title'),[
        'prompt' => 'Выберите производителя',
        //'class' => 'btn-info'
    ]) ?>

    <span class="search_text">Цена от</span>
    <?php echo   $form->field($model, 'min_price')?>
    <?php echo 'до'?>
    <?php echo   $form->field($model, 'max_price')?>

    <div class="form-group">
        <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?> <?php Pjax::end(); ?>

</div>

