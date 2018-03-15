<?php

namespace app\modules\admin\controllers;

use app\controllers\BehaviorController;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
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
                        'controllers' => ['admin/default'],
                        'actions' => ['index', 'logout'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['admin']
                    ],
                ]
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect([
            '/main/index'
        ]);
    }
}
