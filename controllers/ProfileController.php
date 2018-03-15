<?php

namespace app\controllers;

use app\models\ProfileOrder;
use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends BehaviorController
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

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $find = Profile::findOne(['user_id' => Yii::$app->user->identity['id']]);

            if (!$find->user_id == Yii::$app->user->identity['id']) {
                $session = Yii::$app->session;
                $session->setFlash('createProfile');
                return $this->redirect('create');
            }
        }

        $query = ProfileOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $query->where(['profile_id' => Yii::$app->user->identity['id']]);

        return $this->render('view', [
            'model' => $this->findModel(Yii::$app->user->identity['id']),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $query = ProfileOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $query->where(['profile_id' => Yii::$app->user->identity['id']]);

        return $this->render('view', [
            'model' => $this->findModel(Yii::$app->user->identity['id']),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();

        if (!Yii::$app->user->isGuest) {
            $find = Profile::findOne(['user_id' => Yii::$app->user->identity['id']]);

            if ($find->user_id == Yii::$app->user->identity['id']) {
                return $this->goHome();
            }
        }
		
		$model->user_id = Yii::$app->user->identity['id'];
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
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
     * Deletes an existing Profile model.
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
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
