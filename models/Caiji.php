<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caiji".
 *
 * @property integer $id
 * @property string $type
 * @property string $qihao
 * @property string $time_by
 * @property integer $interval_time
 * @property string $switch
 */
class Caiji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caiji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['qihao', 'interval_time'], 'integer'],
            [['time_by'], 'safe'],
            [['type'], 'string', 'max' => 32],
            [['switch'], 'string', 'max' => 255],
            [['type'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'qihao' => 'Qihao',
            'time_by' => 'Time By',
            'interval_time' => 'Interval Time',
            'switch' => 'Switch',
        ];
    }
}
