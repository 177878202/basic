<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordRepeat;
    public $mobile;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            //['username','match','not'=>'ture','pattern'=>'/^\d+$/ ','message'=>'不能纯数字'], /*正则取反*/
            ['username', 'unique', 'targetClass' => '\app\models\User'],
            //['username', 'unique', 'targetClass' => '\app\models\User','targetAttribute' => 'email'],
            ['username', 'string', 'min' => 2, 'max' => 100],

            //['username','match','not'=>'ture','pattern'=>'/^[^%\*\^~\\"\/\\\<\>\|]+$/'],

            ['mobile', 'trim'],
            ['mobile', 'required'],
            ['mobile', 'unique', 'targetClass' => '\app\models\User',],
            ['mobile', 'integer', ],
            ['mobile','match','pattern'=>'/^[1][34578][0-9]{9}$/'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 100],
            ['email', 'unique', 'targetClass' => '\app\models\User', ],
            //['email', 'unique', 'targetClass' => '\app\models\User','targetAttribute' => 'username'],
            //[['username','email'], 'unique', 'targetClass' => '\app\models\User','targetAttribute' => ['username','email']],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['passwordRepeat', 'required'] ,// 必须要加上这一句
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'operator' => '===','message' => '两次密码不一致。'],


            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'verifyCode' => '验证码', //验证码的名称，根据个人喜好设定
            'username'=> '用户名',
            'password'=> '密码',
            'passwordRepeat'=>'重复密码',
            'email'=>'邮箱',
            'mobile'=>'手机号码',
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
        $user->username = $this->username;
        $user->email = $this->email;
        $user->mobile = $this->mobile;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        //$user->created_at = "".date("Y-m-d H:i:s")."";

        return $user->save() ? $user : null;
    }
}
