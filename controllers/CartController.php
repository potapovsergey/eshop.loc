<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 16:46
 */
namespace app\controllers;

use app\models\Goods;
use Yii;
use app\models\Cart;
use yii\web\Controller;

class CartController extends BehaviorController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->post('id');
        $count = (int)Yii::$app->request->post('count');
        $count = !$count ? 1 : $count;
        $goods = Goods::findOne($id);
        if (empty($goods)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($goods, $count);

        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('cart_view', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.count');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart_view', compact('session'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart_view', compact('session'));
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');
        $goods = Goods::findOne($id);
        if (empty($goods)) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();

        unset($_SESSION['coupons'][$goods->id]);
        return $this->actionShow();
    }

    public function actionChangePrice($count)
    {
        $price = 300;
        return $count;
    }
}
