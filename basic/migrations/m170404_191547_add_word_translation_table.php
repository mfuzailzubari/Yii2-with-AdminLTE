<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

class m170404_191547_add_word_translation_table extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $this->createTable('word_translation', [
            'wt_id' => Schema::TYPE_PK,
            'wt_source_word_id' => $this->integer() . ' NOT NULL',
            'wt_source_lang_id' => $this->integer() . ' NOT NULL',
            'wt_target_word_id' => $this->integer() . ' NOT NULL',
            'wt_target_lang_id' => $this->integer() . ' NOT NULL',
        ]);

        // Add foreign key
        $this->addForeignKey('fk_word_translation_1', 'word_translation', 'wt_source_lang_id', 'language', 'lang_id', 'CASCADE', 'NO ACTION');
        // Create index of foreign key
        $this->createIndex('wt_source_lang_id_idx', 'word_translation', 'wt_source_lang_id');

        $this->addForeignKey('fk_word_translation_2', 'word_translation', 'wt_target_lang_id', 'language', 'lang_id', 'CASCADE', 'NO ACTION');
        // Create index of foreign key
        $this->createIndex('wt_target_lang_id_idx', 'word_translation', 'wt_target_lang_id');

        $this->addForeignKey('fk_word_translation_3', 'word_translation', 'wt_source_word_id', 'word', 'word_id', 'CASCADE', 'NO ACTION');
        // Create index of foreign key
        $this->createIndex('wt_source_word_id_idx', 'word_translation', 'wt_source_word_id');

        $this->addForeignKey('fk_word_translation_4', 'word_translation', 'wt_target_word_id', 'word', 'word_id', 'CASCADE', 'NO ACTION');
        // Create index of foreign key
        $this->createIndex('wt_target_word_id_idx', 'word_translation', 'wt_target_word_id');
    }

    public function safeDown() {
        $this->dropTable('word_translation');
    }

}
