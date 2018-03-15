<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.05.2017
 * Time: 16:44
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\components\MyBehaviors;


class BehaviorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                /*'denyCallback' => function($rule, $action){
                    throw new \Exception('Нет доступа');
                },*/
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' => ['reg', 'login'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['?']
                    ],
					[
                        'allow' => true,
                        'controllers' => ['cart', 'main', 'order'],
                        'actions' => ['search','add', 'clear', 'show', 'index', 'goods'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['?', '@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' => ['logout'],
                        'verbs' => ['POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['profile'],
                        'actions' => ['view', 'create','index'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['main'],
                        'actions' => ['index', 'search', 'send-email', 'reset-password']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['widget-test'],
                        'actions' => ['index'],
                        /*'matchCallback' => function($rule, $action){
                            return date('d-m') !== '30-06';
                        }*/
                    ],
                ]
            ],
            'removeUnderscore' => [
                'class' => MyBehaviors::className(),
                'controller' => Yii::$app->controller->id,
                'action' => Yii::$app->controller->action->id,
                'removeUnderscore' => Yii::$app->request->get('search')
            ]
        ];
    }

}