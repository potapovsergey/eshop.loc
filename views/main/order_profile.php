<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.05.2017
 * Time: 2:17
 */

use app\models\Goods;

/* @var $model app\models\ProfileOrder */

$goods = Goods::findOne(['id' => $model->goods_id]);

if ($model->status == "Не обработан") {
    $class = "main-order-profile not-processed";
} else if ($model->status == "Обрабатывается") {
    $class = "main-order-profile processed";
} else if ($model->status == "Обработан") {
    $class = "main-order-profile process";
} else {
    $class = "main-order-profile";
}


?>
<div class="<?= $class ?>">
    <div class="profile_goods_image">
        <?php
        $image = $goods->getImage($model->goods_id);
        ?>
        <img src="<?= $image->getUrl('75x75'); ?>" alt="">
    </div>

    <div class="profile_order_info">
        <table class="profile_table">
            <tr>
                <td class="profile_info">Название:</td>
                <td class="profile_data_text" data-toggle="tooltip" title="<?=$model->name?>">
                    <?php $description = substr($model->name, 0, 13);
                    if(strlen($description) > 12){
                        echo $description.'...';
                    }else {
                        echo $description;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="profile_info">Цена:</td>
                <td class="profile_data_text">
                    <?= $model->price ?>
                </td>
            </tr>
            <tr>
                <td class="profile_info">Количество:</td>
                <td class="profile_data_text">
                    <?= $model->quantity ?>
                </td>
            </tr>
            <tr>
                <td class="profile_info">Статус:</td>
                <td class="profile_data_text">
                    <?= $model->status ?>
                </td>
            </tr>
        </table>
    </div>
</div>
