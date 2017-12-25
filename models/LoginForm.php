<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $verifyCode;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['verifyCode', 'captcha'],
        ];
    }
    public function attributeLabels() {
        return [
            'verifyCode' => '验证码', //验证码的名称，根据个人喜好设定
            'username'=> 'ID/邮箱/手机号码',
            'password'=> '密码',
            'rememberMe'=>'记住登陆',
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            //dd(Yii::$app->security->generatePasswordHash($this->password));
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
           /* if(!$this->_user = User::findByUsername($this->username)){
                if(!$this->_user = User::findByUseremail($this->username)){
                    if(!$this->_user = User::findByUserid($this->username)){
                        $this->_user = User::findByUsermobile($this->username);
                    }
                }
            }*/
            $this->_user=User::find()->where(['or',
               // ['=','username' ,$this->username],
                ['=','email' ,$this->username],
                ['=','mobile' ,$this->username],
                ['=','id' ,$this->username]

            ])->one();
        }

        return $this->_user;
    }
}
