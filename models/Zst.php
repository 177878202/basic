<?php
namespace app\models;


use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use app\models\Algorithm;
use app\models\Bjkl8;
use app\models\Bjpk10;
use app\models\Caiji;
use app\models\Jndkl8;
use app\models\Hgkl8;
use yii\web\NotFoundHttpException;

class Zst extends Model
{
    public $type;
    public $list;
    public $algorithm;
    public $page;
    public $tid;
    //public $style;
    //public $mod;
    //public $sum;

    public $algorithmarr;
    public $array0;
    public $array1;
    public $array2;
    public $array3;
    public $array4;
    public $cols;
    public $caiji;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['type', 'string'],

            ['algorithm', 'integer'],
//
//            ['type', 'exist',
//                'targetClass' => '\app\models\Caiji',
//                'targetAttribute' => 'type'
////                'filter' => ['status' => User::STATUS_ACTIVE]
//            ],
//
//            ['algorithm', 'exist',
//                'targetClass' => '\app\models\Algorithm',
//                'targetAttribute' => 'id'
////                'filter' => ['status' => User::STATUS_ACTIVE]
//            ],

            ['tid', 'integer'],
            ['tid', 'default','value' => 0],

            ['list','default','value'=>100],
            ['list','integer','min' => 10,'max' => 30000],

            ['page', 'integer'],

            ['page', 'default','value' => 1],
            ['page','integer','min' => 1],

            //[ 'alipay', 'string', 'max' => 100],

            //['status', 'default', 'value' => self::STATUS_ACTIVE],
            //['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

        ];
    }

    /**
     * @inheritdoc
     */
    public function __init()
    {
        $this->caiji=Caiji::find()->where(['switch'=>0,'type'=>$this->type])->one();
//            dd( $this->caiji);

        if($this->caiji){

            $this->algorithmarr=Algorithm::find()->where(['and',['type'=>$this->caiji->t,'id'=>$this->algorithm]])->asArray()->one();

            if($this->algorithmarr){
//                dd($this->algorithmarr);
                $this->algorithmarr['count']=json_decode($this->algorithmarr['count'],true);
//                dd($this->algorithmarr);
            }else{
                return false;
            }
        }else{
            return false;
        }
        return true;
    }

    /**
     * @inheritdoc
     */

    public function __init2()
    {
        $caiji_date=Caiji::find()->where(['switch'=>0])->asArray()->all();
        $caiji_column = ArrayHelper::getColumn($caiji_date, 'type');
//dd($caiji_column);
        $this->caiji=ArrayHelper::index($caiji_date, 'type');

        if (!in_array($this->type,$caiji_column)) {

            throw new NotFoundHttpException('The requested page does not exist.');
//            $this->type=$caiji_column[0];
        }
        $this->caiji=$this->caiji[$this->type];
//        dd($this->caiji);

        $algorithm_date=Algorithm::find()->asArray()->all();
        $algorithm_column = ArrayHelper::getColumn($algorithm_date, 'id');

        if (!in_array($this->algorithm,$algorithm_column)) {
            throw new NotFoundHttpException('The requested page does not exist.');
//            $this->algorithm=$algorithm_column[0];
        }

        $tem_arr=ArrayHelper::index($algorithm_date,'id');
        $this->algorithmarr=$tem_arr[$this->algorithm];
        $this->algorithmarr['count']=json_decode($this->algorithmarr['count'],true);

//        $this->style=$tem_arr[$this->algorithm]['style'];
//        $this->mod=$tem_arr[$this->algorithm]['mod'];
//        $this->sum=$tem_arr[$this->algorithm]['sum'];


        $this->list=floor($this->list);
        if($this->list<10){
            $this->list=100;
        }
        if($this->list>20000){
            $this->list=20000;
        }

        $this->page=floor($this->page)-1;
        if($this->page<0){
            $this->page=0;
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getArray0()
    {
        if ($this->array0 === null){

            switch ($this->type)
            {
                case 'hgkl8':
                    $this->array0 = Hgkl8::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*($this->page-1))
                        ->orderBy('qihao DESC')
                        ->all();
                    break;
                case 'bjpk10':
                    $this->array0 = Bjpk10::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*($this->page-1))
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                case 'bjkl8':
                    $this->array0 = Bjkl8::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*($this->page-1))
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                case 'jndkl8':
                    $this->array0 = Jndkl8::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*($this->page-1))
                        ->orderBy('qihao DESC')
                        ->all();

                    break;

                /*           case 'xdl':
                               $this->array0 = Hgkl8::find()
                                   ->asArray()
                                   ->limit($this->list)
                                   ->orderBy('qihao DESC')
                                   ->all();

                               break;*/
            }
        }

        return $this->array0;
    }

    public function getArray0b()
    {
        if ($this->array0 === null){
//            $this->__init();
            switch ($this->type)
            {
                case 'hgkl8':
                    $this->array0 = Hgkl8::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*$this->page-1)
                        ->orderBy('qihao DESC')
                        ->all();
                    break;
                case 'bjpk10':
                    $this->array0 = Bjpk10::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*$this->page-1)
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                case 'bjkl8':
                    $this->array0 = Bjkl8::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*$this->page-1)
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                case 'jndkl8':
                    $this->array0 = Jndkl8::find()
                        ->asArray()
                        ->limit(500)
                        ->offset(500*$this->page-1)
                        ->orderBy('qihao DESC')
                        ->all();

                    break;

                /*           case 'xdl':
                               $this->array0 = Hgkl8::find()
                                   ->asArray()
                                   ->limit($this->list)
                                   ->orderBy('qihao DESC')
                                   ->all();

                               break;*/
            }
        }
//        $tema=array_chunk($this->array0,100);
//dd($this->array0);
        // dd( array_keys(ArrayHelper::index($this->array0,'qihao')));

        return $this->array0;
    }

    public function getArray0a()
    {
        if ($this->array0 === null){
            $this->__init();
            switch ($this->type)
            {
                case 'hgkl8':
                    $this->array0 = Hgkl8::find()
                        ->asArray()
                        ->limit($this->list)
                        ->orderBy('qihao DESC')
                        ->all();
                    break;
                case 'bjpk10':
                    $this->array0 = Bjpk10::find()
                        ->asArray()
                        ->limit($this->list)
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                case 'bjkl8':
                    $this->array0 = Bjkl8::find()
                        ->asArray()
                        ->limit($this->list)
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                case 'jndkl8':
                    $this->array0 = Jndkl8::find()
                        ->asArray()
                        ->limit($this->list)
                        ->orderBy('qihao DESC')
                        ->all();

                    break;
                /*           case 'xdl':
                               $this->array0 = Hgkl8::find()
                                   ->asArray()
                                   ->limit($this->list)
                                   ->orderBy('qihao DESC')
                                   ->all();

                               break;*/
            }
        }
//        $tema=array_chunk($this->array0,100);
//dd($this->array0);
        // dd( array_keys(ArrayHelper::index($this->array0,'qihao')));

        return $this->array0;
    }


    public function getResult($a){
        if (is_array($a)){
            $b=json_decode($a['count'],true);

            foreach ($this->algorithmarr['count'] as $c=>$d){

                $t['dw'][$c]=
                    array_sum(//总和
                        array_intersect_key($b, //使用键名比较计算数组的交集
                            array_flip ( $d )//键值反转
                        )
                    )
                    %$this->algorithmarr['mod']
                    +$this->algorithmarr['sum'];

            }
            $a['count']=implode("+", $t['dw']);
            $a['dw']=$t['dw'];
            $a['result']=array_sum($t['dw']);
        }
        return($a);
    }





    public function getArray1(){
        if((is_array($this->array0)||$this->getArray0())&&$this->array1 === null){
            //$z=json_decode($this->algorithmarr['count'],true);
            foreach ($this->array0 as $a=>$b){


                $this->array0[$a]['count']=json_decode($b['count'],true);

                foreach ($this->algorithmarr['count'] as $c=>$d){

                    if($this->caiji->t===10&&$d==[-1]){

                        $this->array0[$a]['dw'][]=$this->array0[$a]['count'][(($this->array0[$a]['qihao']-1)%10)];

                    }else{
                        $tem=0;
                        foreach ($d as $e=>$f){
                            $tem+=$this->array0[$a]['count'][$f];
                        }
                        $this->array0[$a]['dw'][$c]=$tem%$this->algorithmarr['mod']+$this->algorithmarr['sum'];
                    }

                }

                if($this->caiji->t===10){
                    $this->array1[]=[
                        $this->array0[$a]['qihao'],
                        date('m-d H:i',strtotime($this->array0[$a]['time_by'])),
                        $this->array0[$a]['dw'],
                        $this->array0[$a]['count']
                    ];
                }else{
//                $this->array1[$this->array0[$a]['qihao']]=[date('m-d H:i',strtotime($this->array0[$a]['time_by'])),$this->array0[$a]['dw']];
//                $this->array1[$a]['qihao']=$this->array0[$a]['qihao'];


//
//                $this->array1[$this->array0[$a]['qihao']]['t']=date('m-d H:i',strtotime($this->array0[$a]['time_by']));
//                $this->array1[$this->array0[$a]['qihao']]['d']=$this->array0[$a]['dw'];
//
                    $this->array1[]=[$this->array0[$a]['qihao'],date('m-d H:i',strtotime($this->array0[$a]['time_by'])),$this->array0[$a]['dw']];

                }


//                $this->array1[$a]['count']=implode("+", $this->array0[$a]['dw']);
//                $this->array1[$a]['result']=array_sum($this->array0[$a]['dw']);
                //$this->array0[$a]=ArrayHelper::merge( $this->array0[$a],$this->getHm($this->array0[$a]['result']));

            }

        }
//        ArrayHelper::multisort($this->array1, ['age', 'name'], [SORT_ASC, SORT_DESC]);
//        krsort($this->array1);
        return $this->array1;
    }




    public function getArray1a(){
        if((is_array($this->array0)||$this->getArray0())&&$this->array1 === null){
            //$z=json_decode($this->algorithmarr['count'],true);
            foreach ($this->array0 as $a=>$b){
                $this->array0[$a]['count']=json_decode($b['count'],true);

                foreach ($this->algorithmarr['count'] as $c=>$d){
                    $tem=0;
                    foreach ($d as $e=>$f){
                        $tem+=$this->array0[$a]['count'][$f];
                    }
                    $this->array0[$a]['dw'][$c]=$tem%$this->algorithmarr['mod']+$this->algorithmarr['sum'];

                }
                $this->array1[$a]['qihao']=$this->array0[$a]['qihao'];
                $this->array1[$a]['time_by']=date('m-d H:i',strtotime($this->array0[$a]['time_by']));
                $this->array1[$a]['dw']=$this->array0[$a]['dw'];
//                $this->array1[$a]['count']=implode("+", $this->array0[$a]['dw']);
//                $this->array1[$a]['result']=array_sum($this->array0[$a]['dw']);
                //$this->array0[$a]=ArrayHelper::merge( $this->array0[$a],$this->getHm($this->array0[$a]['result']));

            }

        }
        return $this->array1;
    }
    public function getArray2(){
        if((is_array($this->array1)||$this->getArray1())&&$this->array2 === null){

            $tem_arr=$tem_arr1=$tem_arr2=$tem_arr3=$jg_arr=$jg_arr1=$jg_arr2=array();
            $cs=array(50,100,200,300,500,1000,2000,5000);

            switch ($this->algorithmarr['style']) {
                case '28':
                    $tem_arr['期号']='';
                    $tem_arr['时间']='当前次数';
                    $tem_arr1['期号']='期号';
                    $tem_arr1['时间']='时间';
                    $tem_arr2['期号']='';
                    $tem_arr2['时间']='标准次数';

                    for ($i=0;$i<=9;$i++){
                        for ($j=0;$j<=9;$j++){
                            for ($k=0;$k<=9;$k++){
                                $l=$i+$j+$k;
                                $tem_arr[$l]=0;
                                $tem_arr1[$l]=$l;

                                isset($tem_arr2[$l])?$tem_arr2[$l]++:$tem_arr2[$l]=1;

                                $l%2?(isset($tem_arr2['单'])?$tem_arr2['单']++:$tem_arr2['单']=1)
                                    :(isset($tem_arr2['双'])?$tem_arr2['双']++:$tem_arr2['双']=1);

                                $l>9&&$l<18?(isset($tem_arr2['中'])?$tem_arr2['中']++:$tem_arr2['中']=1)
                                            :(isset($tem_arr2['边'])?$tem_arr2['边']++:$tem_arr2['边']=1);

                                $l>13?(isset($tem_arr2['大'])?$tem_arr2['大']++:$tem_arr2['大']=1)
                                    :(isset($tem_arr2['小'])?$tem_arr2['小']++:$tem_arr2['小']=1);

                                $l%10>4?(isset($tem_arr2['大尾'])?$tem_arr2['大尾']++:$tem_arr2['大尾']=1)
                                    :(isset($tem_arr2['小尾'])?$tem_arr2['小尾']++:$tem_arr2['小尾']=1);


                            }
                        }
                    }
                    $tem_arr['单']=$tem_arr['双']=$tem_arr['中']=$tem_arr['边']=$tem_arr['大']=$tem_arr['小']=$tem_arr['小尾']=$tem_arr['大尾']=0;

                    $tem_arr1['单']='单';
                    $tem_arr1['双']='双';
                    $tem_arr1['中']='中';
                    $tem_arr1['边']='边';
                    $tem_arr1['大']='大';
                    $tem_arr1['小']='小';
                    $tem_arr1['小尾']='小尾';
                    $tem_arr1['大尾']='大尾';

                    $jg_arr1=$jg_arr2=$tem_arr;

                    foreach ($this->array1 as $index=>$a){
                        in_array($index,$cs)&& $tem_arr3[$index]=$tem_arr;
                        $tem_arr[$a['result']]++;
                        $a['result']%2?$tem_arr['单']++:$tem_arr['双']++;
                        ($a['result']>9&&$a['result']<18)?$tem_arr['中']++:$tem_arr['边']++;
                        $a['result']>13?$tem_arr['大']++:$tem_arr['小']++;
                        $a['result']%10>4?$tem_arr['大尾']++:$tem_arr['小尾']++;


                        foreach ($jg_arr1 as $c=>$d){
                            $jg_arr1[$c]++;
                            $jg_arr1[$c]>$jg_arr2[$c]&&$jg_arr2[$c]=$jg_arr1[$c];
                        }

                        $jg_arr1[$a['result']]=0;
                        isset($jg_arr[$a['result']])||$jg_arr[$a['result']]=$index;

                        if ($a['result']%2){
                            $jg_arr1['单']=0;
                            (isset($jg_arr['单'])||$jg_arr['单']=$index);
                        }else{
                            $jg_arr1['双']=0;
                            isset($jg_arr['双'])||$jg_arr['双']=$index;
                        }

                        if ($a['result']>9&&$a['result']<18){
                            $jg_arr1['中']=0;
                            isset($jg_arr['中'])||$jg_arr['中']=$index;
                        }else{
                            $jg_arr1['边']=0;
                            isset($jg_arr['边'])||$jg_arr['边']=$index;
                        }

                        if ($a['result']>13){
                            $jg_arr1['大']=0;
                            isset($jg_arr['大'])||$jg_arr['大']=$index;
                        }else{
                            $jg_arr1['小']=0;
                            isset($jg_arr['小'])||$jg_arr['小']=$index;
                        }

                        if ($a['result']%10>4){
                            $jg_arr1['大尾']=0;
                            isset($jg_arr['大尾'])||$jg_arr['大尾']=$index;
                        }else{
                            $jg_arr1['小尾']=0;
                            isset($jg_arr['小尾'])||$jg_arr['小尾']=$index;
                        }


                    }
                    foreach ($jg_arr1 as $c=>$d){
                        isset($jg_arr[$c])||$jg_arr[$c]=$index+1;
                        isset($jg_arr2[$c])||$jg_arr2[$c]=$index;
                    }
                    //dd($index);
                    break;

                case '16':
                    for ($i=3;$i<=18;$i++){
                        if($i==$data){
                            $temArray[$i]=$data;
                        }else{
                            $temArray[$i]='';
                        }
                    }
                    break;

            }
            //dd($tem_arr);
//            $c=array();
//            foreach ($tem_arr1 as $a=>$b){
//
////                if($a>9&&$a<18){
////                    $c[]=[
////                        'format' => 'raw',
////
////                    ];
////                }
//                $c[]=[
//                    'format' => 'raw',
//                    'attribute' =>$a,
//                ];
//
//
//            }
//            $this->cols=$c;
            $this->array2=[
                'cs'=>[$tem_arr,$tem_arr2,$tem_arr3],
                'jg'=>[$jg_arr,$jg_arr2],
                'bz'=>$tem_arr1,

            ];
        }
        return $this->array2;
    }

    public function getHm2($data){
        switch ($this->algorithmarr['style']) {
            case '28':
                for ($i=0;$i<=27;$i++){
                    if($i==$data){
                        $temArray[$i]=$data;
                    }else{
                        $temArray[$i]='';
                    }
                }
                break;

            case '16':
                for ($i=3;$i<=18;$i++){
                    if($i==$data){
                        $temArray[$i]=$data;
                    }else{
                        $temArray[$i]='';
                    }
                }
                break;

        }
        if($temArray){
            return $temArray ;
        }
        return false;
    }

}