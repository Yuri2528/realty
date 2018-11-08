<?php

namespace app\models;

use Yii;
use yii\base\Model;



/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
	public $password;
	public $email;
	public $rememberMe = true;
	public $status;
	
	private $_user = false;

    

    
    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
		
		    
            // username and password are both required
           [['username', 'password'], 'required', 'on' => 'default'],
			['email','email'],
			['rememberMe', 'boolean'],
			['password', 'validatePassword']
		  ];
    }
	
	public function validatePassword($attribute) {
		
		if (!$this->hasErrors()) {
			
			$user = $this->getUser();
			
			if(!$user||!$user->validatePassword($this->password)) {
				
				$this->addError($arrribute, 'Непаравильное имя пользователя или пароль');
			}
		}
		
	}

	public function attributeLabels()
    {
        return [
            'username' => 'Имя',
			'password' => 'Пароль',
			'rememberMe' => 'Запомнить меня'
			
			
        ];
    }
	
	public function login() {
		
		if ($this->validate()) {
			 
			 $this->status = ($user = $this->getUser()) ? $user->status : User::STATUS_NOT_ACTIVE;
			 
		if ($this->status === User::STATUS_ACTIVE) {
					 			 
			  return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
			 //login($user, $this-rememberMe)
			 //return true;
			
		} else {
			
			return false;
		}
		//return true;
	  }
  
	}
	 public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}

   















