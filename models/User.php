<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $phone
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_admin
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
	      */
	const STATUS_DELETED = 0;
	const STATUS_NOT_ACTIVE = 1;
	const STATUS_ACTIVE = 10;
		  
	public $password;  
		  
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		
		    [[ 'username', 'email', 'password'], 'filter', 'filter' => 'trim'],
			[[ 'username', 'email', 'status'], 'required'],
			['email', 'email'],
			['username', 'string', 'min' => 2, 'max' => 128],
			['password', 'required', 'on' => 'create'],
			['username', 'unique', 'message' => 'Это имя занято.'],
			['email', 'unique', 'message' => 'Это почта уже зарегистрирована'],
            [['id', 'phone', 'is_admin'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password Hash'),
            'status' => Yii::t('app', 'Status'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'phone' => Yii::t('app', 'Phone'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'is_admin' => Yii::t('app', 'Is Admin'),
        ];
    }
	
	//behaviors
	
	public function behaviors() {
		
		return [
		TimestampBehavior::className()
	    ];
	}
	
	public static function findByUsername($username) {
		
		return static::findOne([
		
		'username' => $username
		
		]);
		
	}
	
	
	
	//хелперы
	
	public function setPassword($password) {
		
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}
	
	public function generateAuthKey(){
		
		$this->auth_key = Yii::$app->security->generateRandomString();
	}
	
	public function validatePassword($password) {
		
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}
	
	//Аутентификация
	
	 public static function findIdentity($id)
    {
        return static::findOne([
		'id' => $id,
		'status' => self::STATUS_ACTIVE
		]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
