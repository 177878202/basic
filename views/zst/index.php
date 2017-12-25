<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\widgets\GridView;
use yii\grid\GridView;
use yii\helpers\Url;
/*{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"}
 * uid:用户ID
 * a:数据类型
 * p:算法类型
 * t:收藏的标题名字
// * */
//$model='[{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"2","uid":"0","a":"bjkl8","p":"2801","t":"北京28"},{"id":"3","uid":"0","a":"jndkl8","p":"2802","t":"加拿大28"},{"id":"15","uid":"0","a":"bjpk10","p":"1000","t":"PK10"},{"id":"16","uid":"0","a":"bjpk10","p":"1001","t":"PK10冠军"},{"id":"17","uid":"0","a":"bjpk10","p":"1701","t":"PK10冠亚军"},{"id":"18","uid":"1000","a":"bjkl8","p":"2802","t":"北京282"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"}]';
//$model=json_decode($model,true);//该两行代码其实是从动作获取到的

//dd(Yii::$app->controller->generator);

$this->title = '走势图';
$this->params['breadcrumbs'][] = $this->title;

$user_link=null;
//echo \yii\helpers\Json::encode($model);
//exit;
foreach ($model as $value) {
    if($value['uid']){
        $user_link.='<li><a href="'.
            Url::to(['view','algorithm'=>$value['p'],'type'=>$value['a'],'tid'=>$value['id']])
            .'">'.Html::encode($value['t']).'</a></li>';
    }
}

//dd($user_link);
?>
<div class="container">
    <?php
    if($user_link){
        echo('
            <div class="col-md-12 column">
                <h4>
                收藏夹
                </h4>
                <ul class="breadcrumb">
                    '.$user_link.'
                </ul>
            </div>'
        );
    }
    ?>

    <div class="col-md-12 column">
        <h4>
            常用入口
        </h4>
        <ul class="breadcrumb">
            <?php
            foreach ($model as $value) {
                if($value['uid']==0){
                    echo('
                <li>
                    <a href="'.
                        Url::to(['view','algorithm'=>$value['p'],'type'=>$value['a'],'list'=>100,'tid'=>$value['id']])
                        .'">'.Html::encode($value['t']).'</a>
                </li>');
                }
            }
            ?>
            <li><a href="<?=Url::to(['more'])?>" >更多&gt;&gt;</a></li>
        </ul>
    </div>
</div>
