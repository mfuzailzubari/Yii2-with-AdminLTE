<?php

namespace app\models\WordManagement;

use Yii;

/**
 * This is the model class for table "word".
 *
 * @property integer $word_id
 * @property integer $word_lang_id
 * @property string $word_name
 * @property string $word_detais
 *
 * @property Language $wordLang
 * @property WordTranslation[] $wordTranslations
 * @property WordTranslation[] $wordTranslations0
 */
class Word extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'word';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['word_lang_id'], 'integer'],
            [['word_name'], 'required'],
            [['word_name'], 'string', 'max' => 500],
            [['word_detais'], 'string', 'max' => 1000],
            [['word_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['word_lang_id' => 'lang_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'word_id' => 'Word ID',
            'word_lang_id' => 'Word Lang ID',
            'word_name' => 'Word Name',
            'word_detais' => 'Word Detais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordLang() {
        return $this->hasOne(Language::className(), ['lang_id' => 'word_lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordTranslations() {
        return $this->hasMany(WordTranslation::className(), ['wt_source_word_id' => 'word_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordTranslations0() {
        return $this->hasMany(WordTranslation::className(), ['wt_target_word_id' => 'word_id']);
    }

    public static function getWords() {
        $words = Word::find()->all();

        foreach ($words as $word) {
            $item['word_id'] = $word->word_id;
            $lang = Language::find()->where(['lang_id' => $word->word_lang_id])->one();
            $item['word_name'] = $word->word_name . ' - ' . $lang->lang_name;
            $items[] = $item;
        }

        return isset($items) ? $items : null;
    }

}
