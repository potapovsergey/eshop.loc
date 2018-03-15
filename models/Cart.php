<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 16:46
 */

namespace app\models;


class Cart extends \yii\db\ActiveRecord
{
    public function addToCart($goods, $count = 1)
    {
        if (isset($_SESSION['cart'][$goods->id])) {
            $_SESSION['cart'][$goods->id]['count'] += $count;
        } else {
            $_SESSION['cart'][$goods->id] = [
                'count' => $count,
                'name' => $goods->name,
                'price' => $goods->price,
            ];
        }
        $_SESSION['cart.count'] = isset($_SESSION['cart.count']) ? $_SESSION['cart.count'] + $count : $count;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $count * $goods->price : $count * $goods->price;
    }

    public function deleteToCart($goods)
    {
        $_SESSION['cart.count'] -= $_SESSION['cart']['count'][$goods->id];
        $_SESSION['cart.sum'] -= $_SESSION['cart']['price'][$goods->id];
        unset($_SESSION['cart'][$goods->id]);
    }
}