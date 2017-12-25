<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAsset;

$model='[{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"1","uid":"0","a":"bjkl8","p":"2802","t":"PC28"},{"id":"2","uid":"0","a":"bjkl8","p":"2801","t":"北京28"},{"id":"3","uid":"0","a":"jndkl8","p":"2802","t":"加拿大28"},{"id":"15","uid":"0","a":"bjpk10","p":"1000","t":"PK10"},{"id":"16","uid":"0","a":"bjpk10","p":"1001","t":"PK10冠军"},{"id":"17","uid":"0","a":"bjpk10","p":"1701","t":"PK10冠亚军"},{"id":"18","uid":"1000","a":"bjkl8","p":"2802","t":"北京282"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28"},{"id":"21","uid":"1000","a":"bjkl8","p":"2802","t":"PC28222222"}]';
$model=json_decode($model,true);//该两行代码其实是从动作获取到的

$user_link=null;
//echo \yii\helpers\Json::encode($model);
//exit;
foreach ($model as $value) {
    if($value['uid']){
        $user_link.='<a class="label label-success" href="'.
            Url::to(['view','algorithm'=>$value['p'],'type'=>$value['a'],'tid'=>$value['id']])
            .'">'.Html::encode($value['t']).'</a>';
    }
}

$this->title = '走势图';
$this->params['breadcrumbs'][] = $this->title;

//AppAsset::register($this);
$this->registerCssFile('@web/css/zst2.css' , ['depends' => 'app\assets\AppAsset']);
?>

<div class="content col-sm-7 col-md-8 clearfix" >


    <div class="label-zst" >

        <?php
        if($user_link){
            echo(' <h3 class="category-title">收藏夹</h3>
                            <h4>'.$user_link.'</h4>'

            );
        }
        ?>

        <div class="clearfix"></div>

        <h3 class="category-title">常用入口</h3>
        <h4>
            <?php
            foreach ($model as $value) {
                if($value['uid']==0){
                    echo('         
                        <a class="label label-info" href="'.
                        Url::to(['view','algorithm'=>$value['p'],'type'=>$value['a'],'list'=>100,'tid'=>$value['id']])
                        .'">'.Html::encode($value['t']).'</a>'
                    );
                }
            }
            ?>
            <a  class="label label-warning" href="<?=Url::to(['more'])?>" >更多</a>
        </h4>

    </div>


</div> <!--end content -->




<div class = "sidebar col-sm-5 col-md-4">
    <div class="info-box ">
        <span class="info-box-icon glyphicon glyphicon-stats"></span>

        <div class="info-box-content clearfix">
            <h4>遗漏数据</h4>
            <p>看看号码多久没开了？</p>
            <!-- <button type="button" class="btn btn-default">怎么用？</button> -->
        </div>
    </div>

    <div class="info-box ">
        <span class="info-box-icon glyphicon glyphicon-th"></span>

        <div class="info-box-content clearfix">
            <h4>号码分组</h4>
            <p>杀组、跟火车更方便</p>
        </div>
    </div>
</div>



