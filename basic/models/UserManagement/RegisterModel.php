<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models\UserManagement;

use Yii;
use yii\base\Model;

/**
 * Description of RegisterModel
 *
 * @author stahlen
 */
class RegisterModel extends Model
{
    public $fname;
    public $lname;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname'], 'trim'],
            [['fname', 'lname'], 'required'],
            ['fname', 'string', 'min' => 3, 'max' => 45],
            ['lname', 'string', 'min' => 3, 'max' => 45],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            //['email', 'unique', 'targetClass' => '\app\models\UserManagement\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->user_first_name = $this->fname;
        $user->user_last_name = $this->lname;
        $user->user_email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
