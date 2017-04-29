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
use app\models\WordManagement\WordTranslation;
use app\models\WordManagement\Language;
use app\models\WordManagement\Word;

/**
 * Description of FeedbackController
 *
 * @author softrove
 */
class TranslationController extends ActiveController {

    public $modelClass = 'app\models\WordManagement\WordTranslation';

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
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex() {

        Yii::info('Call received at user listing.');

        $word_translations = WordTranslation::find();
        if (isset(\Yii::$app->request->queryParams['sid']))
            $word_translations->andFilterWhere(['wt_source_lang_id' => \Yii::$app->request->queryParams['sid']]);
        if (isset(\Yii::$app->request->queryParams['tid']))
            $word_translations->andFilterWhere(['wt_target_lang_id' => \Yii::$app->request->queryParams['tid']]);

        foreach ($word_translations->all() as $word_translation) {

            $source_lang = \app\models\WordManagement\Language::find()->where(['lang_id' => $word_translation->wt_source_lang_id])->one();
            $source_word = Word::find()->where(['word_id' => $word_translation->wt_source_word_id])->one();
            $translation['source_lang_name'] = $source_lang->lang_name;
            $translation['source_lang_id'] = $source_lang->lang_id;
            $translation['source_word'] = $source_word->word_name;

            $target_lang = \app\models\WordManagement\Language::find()->where(['lang_id' => $word_translation->wt_target_lang_id])->one();
            $target_word = Word::find()->where(['word_id' => $word_translation->wt_target_word_id])->one();
            $translation['target_lang_name'] = $target_lang->lang_name;
            $translation['target_lang_id'] = $target_lang->lang_id;
            $translation['target_word'] = $target_word->word_name;
            $translations[] = $translation;
        }

        return isset($translations) ? $translations : null;
    }

}
