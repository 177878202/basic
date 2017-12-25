<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "algorithm".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $count
 * @property integer $type
 * @property integer $style
 * @property integer $mod
 * @property integer $sum
 */
class Algorithm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'algorithm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'type', 'style', 'mod', 'sum'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['count'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'count' => 'Count',
            'type' => 'Type',
            'style' => 'Style',
            'mod' => 'Mod',
            'sum' => 'Sum',
        ];
    }
}
