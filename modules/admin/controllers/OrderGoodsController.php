<?php

namespace app\modules\admin\controllers;

use app\models\ProfileOrder;
use Yii;
use app\models\OrderGoods;
use app\models\OrderGoodsSearch;
use app\controllers\BehaviorController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrderGoodsController implements the CRUD actions for OrderGoods model.
 */
class OrderGoodsController extends BehaviorController
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
            'access' => [
                'class' => AccessControl::className(),
                /*'denyCallback' => function($rule, $action){
                    throw new \Exception('Нет доступа');
                },*/
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['admin/order-goods'],
                        'actions' => ['index','view', 'create', 'update', 'delete', 'processed', 'delivered'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['admin']
                    ],
                ]
            ],
        ];
    }

    /**
     * Lists all OrderGoods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderGoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderGoods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $status = OrderGoods::findOne(['id' => $id]);
        $statusP = ProfileOrder::findOne(['order_id' => $status->id]);
        $status->status = "Обрабатывается";
        $status->save();
        if (!$statusP == null){
            $statusP->status = "Обрабатывается";
            $statusP->save();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProcessed($id)
    {
        $status = OrderGoods::findOne(['id' => $id]);
        $statusP = ProfileOrder::findOne(['order_id' => $status->id]);
        $status->status = "Обработан";
        $status->save();
        if (!$statusP == null){
            $statusP->status = "Обработан";
            $statusP->save();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelivered($id)
    {
        $status = OrderGoods::findOne(['id' => $id]);
        $statusP = ProfileOrder::findOne(['order_id' => $status->id]);
        $status->status = "Доставлен";
        $status->save();
        if (!$statusP == null){
            $statusP->status = "Доставлен";
            $statusP->save();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrderGoods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderGoods();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OrderGoods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OrderGoods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderGoods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderGoods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderGoods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
