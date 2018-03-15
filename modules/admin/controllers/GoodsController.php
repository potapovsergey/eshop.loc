<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\Characteristics;
use app\models\ValuesCharacteristics;
use Yii;
use app\models\Goods;
use app\models\GoodsSearch;
use app\controllers\BehaviorController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends BehaviorController
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
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
            'access' => [
                'class' => AccessControl::className(),
                /*'denyCallback' => function($rule, $action){
                    throw new \Exception('Нет доступа');
                },*/
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['admin/goods'],
                        'actions' => ['index', 'view', 'create', 'update', 'create-characteristics', 'add-characteristics'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['admin']
                    ],
                ]
            ],
        ];
    }

    /**
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateCharacteristics($id)
    {
        $model = new Characteristics();

        if ($model->load(Yii::$app->request->get()) && $model->save()){

            return $this->redirect(['add-characteristics', 'id' => $id]);
        }

        return $this->render('create_characteristics', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionAddCharacteristics($id)
    {
        $model = new ValuesCharacteristics();
        $goods = Goods::findOne(['id' => $id]);

        $model->goods_id = $goods->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            $model = new ValuesCharacteristics();
            return $this->render('add_characteristics', [
                'model' => $model,
                'goods' => $goods
            ]);
        }

        return $this->render('add_characteristics', [
            'model' => $model,
            'goods' => $goods
        ]);
    }

    public function actionCreate()
    {
        $model = new Goods();

        $model->rating = 0.0;
        $model->created_at = time();
        $model->updated_at = time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image){
                $path = Yii::getAlias('@webroot/images/').$model->image->baseName.'.'.$model->image->extension;
                $model->image->saveAs($path);
                $model->attachImage($path);
            }
            return $this->redirect(['add-characteristics', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image){
                $path = Yii::getAlias('@webroot/images/').$model->image->baseName.'.'.$model->image->extension;
                $model->image->saveAs($path);
                $model->attachImage($path);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
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
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
