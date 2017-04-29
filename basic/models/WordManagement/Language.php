<?php

namespace app\models\WordManagement;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $lang_id
 * @property string $lang_name
 * @property string $lang_code
 * @property integer $lang_is_enable
 * @property integer $lang_is_rtl
 * @property integer $lang_created_at
 * @property integer $lang_modified_at
 */
class Language extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // [['lang_name', 'lang_code', 'lang_is_enable', 'lang_is_rtl', 'lang_created_at', 'lang_modified_at'], 'required'],
            [['lang_is_enable', 'lang_is_rtl', 'lang_created_at', 'lang_modified_at'], 'integer'],
            [['lang_name'], 'string', 'max' => 100],
            [['lang_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'lang_id' => 'Lang ID',
            'lang_name' => 'Lang Name',
            'lang_code' => 'Lang Code',
            'lang_is_enable' => 'Lang Is Enable',
            'lang_is_rtl' => 'Lang Is Rtl',
            'lang_created_at' => 'Lang Created At',
            'lang_modified_at' => 'Lang Modified At',
        ];
    }

    public static function getLanguages() {
        return Language::find()->where(['lang_is_enable' => true])->all();
    }

}
