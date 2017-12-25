<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zstlink".
 *
 * @property integer $Id
 * @property integer $uid
 * @property string $a
 * @property string $p
 * @property string $t
 */
class Zstlink extends \yii\db\ActiveRecord
{
    public $type;
    public $algorithm;
    public $tid;
    public $title;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type','title'], 'string'],
            [['algorithm','tid'], 'integer'],
            //[ 'alipay', 'string', 'max' => 100],

            //['status', 'default', 'value' => self::STATUS_ACTIVE],
            //['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['uid'], 'integer'],
            [['a', 'p', 't'], 'string', 'max' => 255],
            [['type','algorithm','tid'], 'required'],

            ['type', 'exist',
                'targetClass' => '\app\models\Caiji',
                'targetAttribute' => 'type'
//                'filter' => ['status' => User::STATUS_ACTIVE]
            ],
            ['algorithm', 'exist',
                'targetClass' => '\app\models\Algorithm',
                'targetAttribute' => 'id'
//                'filter' => ['status' => User::STATUS_ACTIVE]
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zstlink';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'uid' => 'Uid',
            'a' => 'A',
            'p' => 'P',
            't' => 'T',
        ];
    }
    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        // 注意，重载之后要调用父类同名函数
        if (parent::beforeSave($insert)) {
            $this->uid=Yii::$app->user->getId();
            $this->a=$this->type;
            $this->p=$this->algorithm;
            $this->t=$this->title;
            return true;
        } else {
            return false;
        }
    }
}
