<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gametype".
 *
 * @property integer $id
 * @property integer $n
 * @property string $c
 * @property string $a
 */
class Gametype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gametype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n'], 'integer'],
            [['c', 'a'], 'string', 'max' => 255],
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
            'c' => 'C',
            'a' => 'A',
        ];
    }
}
