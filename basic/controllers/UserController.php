<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['index'],
                'rules' => [
                        [
                        'actions' => ['login', 'error', 'register', 'forget'],
                        'allow' => true,
                    ],
                        [
                        'actions' => ['logout', 'forget'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {

        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new \app\models\UserManagement\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }
    
     /**
     * Register action.
     *
     * @return string
     */
    public function actionRegister()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new \app\models\UserManagement\RegisterModel();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goBack();
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
//    public function actionLogout() {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }

}
