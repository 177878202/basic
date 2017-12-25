<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $n
 * @property integer $s
 * @property string $m
 * @property integer $h
 * @property integer $t
 * @property integer $d
 * @property integer $a
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 's', 'h', 't', 'd', 'a'], 'integer'],
            [['m'], 'string'],
            [['n'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'n' => '方案名称',
            's' => '开始模式',
            'm' => '模式数组',
            'h' => '是否分享',
            't' => '游戏类型',
            'd' => '数据源',
            'a' => '算法',
        ];
    }
}
