<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\OrderGoods;
use app\models\Profile;
use app\models\ProfileOrder;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends BehaviorController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Order();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $query = OrderGoods::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        $query->where(['order_id' => $id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionOrder($id)
    {
        $model = new Order();

        $session = Yii::$app->session;
        $session->open();

        if (!Yii::$app->user->isGuest && $id == true) {
            $profile = Profile::findOne(['user_id' => Yii::$app->user->identity['id']]);
            $model->first_name = $profile->first_name;
            $model->last_name = $profile->last_name;
            $model->phone = $profile->phone;
            $model->address = $profile->address;
            $model->save();
            $session->setFlash('orderAccepted');
            $this->saveOrderGoods($session['cart'], $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->order() && $model->save()) {
                $session->setFlash('orderAccepted');
                $this->saveOrderGoods($session['cart'], $model->id);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('order', [
            'model' => $model,
        ]);
    }

    protected function saveOrderGoods($cart, $order_id)
    {
        foreach ($cart as $id => $item){
            $model = new OrderGoods();
            $model->goods_id = $id;
            $model->order_id = $order_id;
            $model->name = $item['name'];
            $model->price = $item['price'];
            $model->quantity = $item['count'];
            $model->status = 'Не обработан';
            $model->save();
            $profile = new ProfileOrder();
            $profile->goods_id = $id;
            $profile->order_id = $model->id;
            $profile->profile_id = Yii::$app->user->identity['id'];
            $profile->name = $item['name'];
            $profile->price = $item['price'];
            $profile->quantity = $item['count'];
            $profile->status = 'Не обработан';
            $profile->save();
            $this->clearCart();
        }
    }

    public function clearCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.count');
        $session->remove('cart.sum');
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
