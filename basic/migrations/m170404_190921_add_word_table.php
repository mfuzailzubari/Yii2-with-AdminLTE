<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

class m170404_190921_add_word_table extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $this->createTable('word', [
            'word_id' => Schema::TYPE_PK,
            'word_lang_id' => $this->integer(),
            'word_name' => $this->string(500) . ' NOT NULL',
            'word_detais' => $this->string(1000),
        ]);

        // Add foreign key
         $this->addForeignKey('fk_language_word_1', 'word',
                'word_lang_id', 'language', 'lang_id', 'CASCADE', 'NO ACTION');
        
        // Create index of foreign key
        $this->createIndex('word_lang_id_idx', 'word', 'word_lang_id');
    }

    public function safeDown() {
        $this->dropTable('word');
    }

}
