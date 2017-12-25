<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgkl8".
 *
 * @property string $qihao
 * @property string $time_by
 * @property string $count
 */
class Hgkl8 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hgkl8';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_by'], 'safe'],
            [['count'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qihao' => 'Qihao',
            'time_by' => 'Time By',
            'count' => 'Count',
        ];
    }
}
