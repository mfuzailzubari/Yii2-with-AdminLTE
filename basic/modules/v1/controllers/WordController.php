<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\v1\controllers;

use yii;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\AccessControl;

/**
 * Description of FeedbackController
 *
 * @author softrove
 */
class WordController extends ActiveController {

    public $modelClass = 'app\models\WordManagement\Word';

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => Yii::$app->params['cors'],
        ];

        $behaviors['compositeAuth'] = [
            'class' => \yii\filters\auth\CompositeAuth::className(),
            'except' => [
                'options', 'view', 'index',
            ],
            'authMethods' => [
                \yii\filters\auth\HttpBearerAuth::className(),
            ],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        /*
          $behaviors['access'] = [
          'class' => AccessControl::className(),
          'except' => [
          'options',
          'view', 'index',
          ],
          'rules' => [
          [
          'allow' => true,
          'actions' => [''],
          'roles' => [UserType::USER_EXPERT, UserType::USER_NORMAL],
          ],
          [
          'allow' => true,
          'actions' => ['create', 'update'],
          'roles' => [UserType::USER_ADMIN, UserType::USER_SUPERADMIN],
          ],
          ],
          ];
         * 
         */
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions() {

        $actions = parent::actions();
        return $actions;
    }

}
