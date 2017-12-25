<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "button".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $c
 * @property string $n
 * @property integer $i
 * @property integer $t
 */
class Button extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $a;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'button';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t','n','a','b','d'],'required'],
            [['uid', 'i', 't'], 'integer'],
            [['c'], 'string', 'max' => 255],
            [['n','b','d'], 'string', 'max' => 30,'min'=>1],
            [['a'], 'safe'],
            ['t','in','range'=> [28,16,11,10,36,22,17]],
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
            'c' => '内容',
            'n' => '标题',
            'i' => '顺序',
            't' => '类型',
            'a' => '号码',
            'd' => '无内容时颜色',
            'b' => '有内容时颜色',
        ];
    }
    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        // 注意，重载之后要调用父类同名函数
        if (parent::beforeSave($insert)) {
//            array_flip(array_flip($this->a));
//            krsort($this->a);
            foreach ($this->a as $k=>$v){
                $this->a[$k]=intval($v);
            }
//            dd($this->a);
            $this->c=json_encode($this->a);
            $this->uid=Yii::$app->user->getId();
//            dd($this->c);
            return true;
        } else {
            return false;
        }
    }
    /**
     * @inheritdoc
     */
    public static function getBtn0($t)
    {
        $r=[];
        $a= static::find()
            ->where(['uid'=>'0','t'=>$t])
            ->orderBy('i')
            ->asArray()
            ->all();
        foreach ($a as $c=>$d){
            $r[]=[$d['id'],Html::encode($d['n']),json_decode($d['c'],true),$d['b'],$d['d']];
//            $r[$d['id']]=(object)$r[$d['id']];
        }
//dd($r);
        if (Yii::$app->user->id){
            $b= static::find()
                ->where(['uid'=>Yii::$app->user->id,'t'=>$t])
                ->orderBy('i')
                ->asArray()
                ->all();

            foreach ($b as $c=>$d){
//                $r[$d['id']][$d['n']]=json_decode($d['c'],true);
                $r[]=[$d['id'],Html::encode($d['n']),json_decode($d['c'],true),$d['b'],$d['d']];
//                $r[$d['id']]=(object)$r[$d['id']];
            }
        }
        return $r;

//        return 'button';
    }
}
