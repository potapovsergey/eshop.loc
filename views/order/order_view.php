<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.05.2017
 * Time: 2:17
 */

use app\models\Goods;

/* @var $model app\models\OrderGoods */

$goods = Goods::findOne(['id' => $model->goods_id]);

?>
<div class="main-order-profile">
    <div class="profile_goods_image">
        <?
        $image = $goods->getImage($model->goods_id);
        ?>
        <img src="<?= $image->getUrl('75x75'); ?>" alt="">
    </div>

    <div class="profile_order_info">
        <table class="profile_table">
            <tr>
                <td class="profile_info">Название:</td>
                <td class="profile_data_text">
                    <?= $model->name ?>
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
        </table>
    </div>
</div>
