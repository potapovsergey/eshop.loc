<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.04.2017
 * Time: 0:44
 */

namespace app\controllers;


use Yii;
use app\models\RegForm;
use app\models\LoginForm;
use app\models\User;
use app\models\Goods;
use app\models\GoodsSearch;
use app\models\Profile;
use yii\data\ActiveDataProvider;

class MainController extends BehaviorController
{
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionReg()
    {
        $model = new RegForm();
		
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === User::STATUS_ACTIVE):
                    if (Yii::$app->getUser()->login($user)):
                        Yii::$app->session->setFlash('registerSuccess');
						return $this->redirect(['/profile/create']);
                    endif;
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'reg',
            [
                'model'=>$model
            ]
        );
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()):
            return $this->goBack();
        endif;

        if (!Yii::$app->request->isAjax){
            return $this->render(
                'login',
                [
                    'model' => $model
                ]
            );
        }

        $this->layout = false;
        return $this->render(
            'modal_login',
            [
                'model' => $model
            ]
        );
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('search');
        $query = Goods::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        $query->Where(['like', 'name', $search]);
        $query->Where(['like', 'tags', $search]);
        //$query->andFilterWhere(['like', 'description', $search]);
        return $this->render('search',[
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect([
            '/main/index'
        ]);
    }

//    public function actionRole()
//    {
////        $role = Yii::$app->authManager->createRole('admin');
////        $role->description = 'Администратор';
////        Yii::$app->authManager->add($role);
//
//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());
//
//        return $this->goHome();
//    }
}