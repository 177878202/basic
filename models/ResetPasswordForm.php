<?php
namespace app\models;

use yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use app\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $passwordRepeat;

    /**
     * @var \app\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (Yii::$app->user->isGuest) {

            if (empty($token) || !is_string($token)) {
                throw new InvalidParamException('密码重置令牌不能是空白的。');
            }
            $this->_user = User::findByPasswordResetToken($token);
            if (!$this->_user) {
                throw new InvalidParamException('Wrong password reset token.错误的密码重置令牌。');
            }

        }else{
            $this->_user = User::findOne(Yii::$app->user->id);

        }


        parent::__construct($config);

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['passwordRepeat', 'required'] ,// 必须要加上这一句
            ['passwordRepeat',
                'compare',
                'compareAttribute' => 'password',
                'operator' => '===',
                'message' => '两次密码不一致。'],
        ];
    }

    public function attributeLabels() {
        return [
            'password'=> '密    码',
            'passwordRepeat'=>'重复密码',
        ];
    }
    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
