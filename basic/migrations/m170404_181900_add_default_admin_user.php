<?php

use yii\db\Migration;
use app\models\UserManagement\User;

class m170404_181900_add_default_admin_user extends Migration {

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {
        $user = new User();
        $user->user_email = 'admin@admin.com';
        $user->user_first_name = 'admin';
        $user->user_last_name = 'admin';
        $user->setPassword('admin@123');
        $user->user_created_at = time();
        $user->user_modified_at = time();
        if (!$user->validate() or ! $user->save()) {
            print_r($user->getErrors());
            return false;
        }
    }

    public function safeDown() {
        User::deleteAll('user_email = "admin@admin.com"');
    }

}
