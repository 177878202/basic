<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $verifyCode;

    public $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
           // ['email', 'email'],
           // ['email', 'exist',
                //'targetClass' => '\app\models\User',
                //'targetAttribute'=>['email'=>'id','email'=>'username','email'=>'email','email'=>'mobile'],
                //'filter' => ['status' => User::STATUS_ACTIVE],
               // 'message' => 'There is no user with this email address.'
           // ],

            ['email', 'validateEmail'],



            ['verifyCode', 'captcha'],
        ];
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            //dd(Yii::$app->security->generatePasswordHash($this->password));
            //dd($user);
            if (!$user ) {
                $this->addError($attribute, '找不到该用户。');
            }
        }
    }
    public function attributeLabels() {
        return [
            'verifyCode' => '验证码', //验证码的名称，根据个人喜好设定
            'email'=> 'ID/邮箱/手机号码',
        ];
    }
    protected function getUser()
    {
        if ($this->_user === null) {
         /*   if(!$this->_user = User::findByUsername($this->username)){
                if(!$this->_user = User::findByUseremail($this->username)){
                    if(!$this->_user = User::findByUserid($this->username)){
                        $this->_user = User::findByUsermobile($this->username);
                    }
                }
            }*/
            $this->_user=User::find()->where(['or',
               // ['=','username' ,$this->email],
                ['=','email' ,$this->email],
                ['=','mobile' ,$this->email],
                ['=','id' ,$this->email]

            ])->one();
        }

        return $this->_user;
    }
    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        /*
        $user = User::findOne([
           // 'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);
        */
        $user = $this->_user;
        //dd($user);
        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
    }
}
