<?php

namespace app\models\WordManagement;

use Yii;

/**
 * This is the model class for table "word_translation".
 *
 * @property integer $wt_id
 * @property integer $wt_source_word_id
 * @property integer $wt_source_lang_id
 * @property integer $wt_target_word_id
 * @property integer $wt_target_lang_id
 *
 * @property Language $wtSourceLang
 * @property Language $wtTargetLang
 * @property Word $wtSourceWord
 * @property Word $wtTargetWord
 */
class WordTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'word_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            //[['wt_source_word_id', 'wt_source_lang_id', 'wt_target_word_id', 'wt_target_lang_id'], 'required'],
            [['wt_source_word_id', 'wt_source_lang_id', 'wt_target_word_id', 'wt_target_lang_id'], 'integer'],
            [['wt_source_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['wt_source_lang_id' => 'lang_id']],
            [['wt_target_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['wt_target_lang_id' => 'lang_id']],
            [['wt_source_word_id'], 'exist', 'skipOnError' => true, 'targetClass' => Word::className(), 'targetAttribute' => ['wt_source_word_id' => 'word_id']],
            [['wt_target_word_id'], 'exist', 'skipOnError' => true, 'targetClass' => Word::className(), 'targetAttribute' => ['wt_target_word_id' => 'word_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'wt_id' => 'Wt ID',
            'wt_source_word_id' => 'Wt Source Word ID',
            'wt_source_lang_id' => 'Wt Source Lang ID',
            'wt_target_word_id' => 'Wt Target Word ID',
            'wt_target_lang_id' => 'Wt Target Lang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtSourceLang() {
        return $this->hasOne(Language::className(), ['lang_id' => 'wt_source_lang_id']);
    }

    public function getSourceLang() {
        return $this->getWtSourceLang()->one()->lang_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtTargetLang() {
        return $this->hasOne(Language::className(), ['lang_id' => 'wt_target_lang_id']);
    }

    public function getTargetLang() {
        return $this->getWtTargetLang()->one()->lang_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtSourceWord() {
        return $this->hasOne(Word::className(), ['word_id' => 'wt_source_word_id']);
    }

    public function getSourceWord() {
        return $this->getWtSourceWord()->one()->word_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWtTargetWord() {
        return $this->hasOne(Word::className(), ['word_id' => 'wt_target_word_id']);
    }

    public function getTargetWord() {
        return $this->getWtTargetWord()->one()->word_name;
    }
    
}
