<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

class m170404_185528_add_language_table extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $this->createTable('language', [
            'lang_id' => Schema::TYPE_PK,
            'lang_name' => $this->string(100) . ' NOT NULL',
            'lang_code' => $this->string(10) . ' NOT NULL',
            'lang_is_enable' => $this->boolean() . ' NOT NULL',
            'lang_is_rtl' => $this->boolean() . ' NOT NULL',
            'lang_created_at' => $this->integer() . ' NOT NULL',
            'lang_modified_at' => $this->integer() . ' NOT NULL',
        ]);

        // Create index of foreign key
        $this->createIndex('lang_id_idx', 'language', 'lang_id');

        // Create index of foreign key
        $this->createIndex('lang_code_idx', 'language', 'lang_code');
        
    }

    public function safeDown() {
        $this->dropTable('language');
    }

}
