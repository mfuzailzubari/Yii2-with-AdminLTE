<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

class m170404_180917_add_user_table extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {

        $this->createTable('user', [
            'user_id' => Schema::TYPE_PK,
            'user_first_name' => $this->string(100) . ' NOT NULL',
            'user_last_name' => $this->string(100) . ' NOT NULL',
            'user_email' => $this->string(100) . ' NOT NULL',
            'user_password' => $this->string(500) . ' NOT NULL',
            'user_access_token' => $this->string(500),
            'user_auth_token' => $this->string(500),
            'user_created_at' => $this->integer() . ' NOT NULL',
            'user_modified_at' => $this->integer() . ' NOT NULL',
        ]);

        // Create index of foreign key
        $this->createIndex('user_email_idx', 'user', 'user_email');

        // Create index of foreign key
        $this->createIndex('user_password_idx', 'user', 'user_password');
    }

    public function safeDown() {
        $this->dropTable('user');
    }

}
