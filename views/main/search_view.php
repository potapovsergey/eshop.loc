<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.04.2017
 * Time: 9:58
 */
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */

?>
<div class="well">
    <?= $model->name ?>
    <?= $model->price ?>
    <?= $model->description ?>
    <a href="<? Url::to(['/cart/add', 'id' => $model->id]) ?>" class="btn btn-default cart_add" data-id="<?= $model->id ?>">В Корзину</a>
</div>