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
class RegForm extends Model
{
    public $username;
	public $email;
    public $password;
	public $status;
    

    
    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
		    [[ 'username', 'email', 'password'], 'filter', 'filter' => 'trim'],
			[[ 'username', 'email', 'password'], 'required'],
			['email', 'email'],
			['username', 'string', 'min' => 2, 'max' => 128],
			['password', 'string', 'min' => 6, 'max' => 255],
			//['password', 'required', 'on' => 'create'],
			['username', 'unique', 
			'targetClass' => User::className(), //'\app\models\User',
			'message' => 'Выберите другое имя, это имя занято.'],
			['email', 'email'],
			['email', 'unique', 
			'targetClass' => User::className(),
			'message' => 'Это почта уже зарегистрирована'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' => [
			User::STATUS_NOT_ACTIVE,
			User::STATUS_ACTIVE
           ]]
		   // ['username', 'string', 'min' => 5, 'on' =>'test'] rule for scenario
		 ];
			  
    }

	public function attributeLabels()
    {
        return [
            'username' => 'Имя',
			'email' => 'Эл. почта',
			'password' => 'Пароль',
			
			
        ];
    }
	
	public function reg() {
		
		$user = new User();
		
		$user ->username = $this->username;
		
		$user->email = $this->email;
		
		$user->status = $this->status;
		
		$user->setPassword($this->password);
		
		$user->generateAuthKey();
		
		return $user->save() ? $user : null;
		
		//return false;
	}
}
   