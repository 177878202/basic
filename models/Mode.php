<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mode".
 *
 * @property integer $id
 * @property string $n
 * @property integer $uid
 * @property integer $t
 * @property string $c
 */
class Mode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 't'], 'integer'],
            [['c'], 'string'],
            [['n'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'n' => 'N',
            'uid' => 'Uid',
            't' => 'T',
            'c' => 'C',
        ];
    }
}
