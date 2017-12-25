<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "webname".
 *
 * @property integer $Id
 * @property string $n
 * @property string $r
 * @property string $a
 * @property string $l
 * @property integer $w
 * @property string $i
 * @property integer $c
 * @property integer $p
 */
class Webname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['w', 'c', 'p'], 'integer'],
            [['n', 'r', 'a', 'l', 'i'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'n' => 'N',
            'r' => 'R',
            'a' => 'A',
            'l' => 'L',
            'w' => 'W',
            'i' => 'I',
            'c' => 'C',
            'p' => 'P',
        ];
    }
}
