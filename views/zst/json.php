<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
//use yii\widgets\DetailView;
////use yii\widgets\GridView;
//use yii\grid\GridView;
//use yii\widgets\LinkPager;
//use app\assets\AppAsset;
//
//AppAsset::register($this);
//
//AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/zst.css");
//foreach ($button as $a=>$b){
//    $button[$a]['c']=json_decode($b['c'],true);
//}
//dd($model);

if($title){
    if($title->uid===Yii::$app->user->id){
        $add_link_btn='修改标题';

    }else{
        $add_link_btn='复制收藏';
    }
    $this->title =Html::encode($title->t);
}else{
    $this->title = $model->caiji['name'].$model->algorithmarr['style']. $model->algorithmarr['name'];
    $add_link_btn='添加收藏';
}
$this->params['breadcrumbs'][] = ['label' => '走势图', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '数据', 'url' => ['more']];
$this->params['breadcrumbs'][] = ['label' => '算法', 'url' => ['more','type'=>$model->type]];
$this->params['breadcrumbs'][] = ['label' => $model->list.'期'];
$this->params['breadcrumbs'][] = ['label' => '按钮管理', 'url' => ['button/index','t'=>$model->algorithmarr['style']]];
$this->params['breadcrumbs'][] = ['label' => '预留', 'url' => 'javascript:void(0);'];
//$this->params['breadcrumbs'][] = $this->title;
//$this->registerCssFile('@web/media/css/jquery.dataTables.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/jquery.pagination.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/common.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/zst.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/'.$model->algorithmarr['style'].'.css' , ['depends' => 'app\assets\AppAsset']);

//$this->registerJsFile('@web/media/js/jquery.dataTables.js' , ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('@web/js/jquery.pagination-1.2.7.min.js' , ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('@web/js/common.js' , ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('@web/js/zst.js' , ['depends' => 'app\assets\AppAsset']);
//$this->registerJsFile('@web/js/'.$model->algorithmarr['style'].'.js' , ['depends' => 'app\assets\AppAsset']);
//dd(json_encode($button));
$this->registerJs('
var type="'.$model->type.'";
var alo='.$model->algorithm.';
var t='.$model->algorithmarr['style'].';
var tid='.$model->tid.';
var p='.$model->list.';
var button='.json_encode($button).';
',$this::POS_HEAD);

?>
<div class="row clearfix" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12 column">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" ><span id="refreshens"></span></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <?= Html::beginForm(['addlink','tid'=>$model->tid,'type'=>$model->type,'algorithm'=>$model->algorithm], 'post',['class' =>'navbar-form  navbar-right']) ?>
                <?= Html::input('text', 'title', Html::decode($this->title), ['class' => 'form-control','placeholder'=>'收藏链接的标题']) ?>
                <?= Html::submitButton($add_link_btn, ['class' => 'btn btn-default']) ?>
                <?= Html::endForm()?>
                <div class="navbar-form navbar-right" role="search">
                    <a class="glyphicon glyphicon-volume-up" href="javascript:void (0);"  id="pbgSet">
                        提示音
                    </a>
                    <a  class="glyphicon glyphicon-refresh" href="javascript:void (0);" id="pautopenSet">
                        自动刷新
                    </a>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="要统计多少期？" id="input_list" onkeydown="if(event.keyCode===13){o()}"/>
                        <button type="button" class="btn btn-default" onclick="o()">Go</button>
                    </div>
                </div>


            </div>
        </nav>
    </div>
</div>



<table class="table  table-condensed" id="myTable">
    <tbody id="myTbody">
    <tr>
        <td>数据越多，加载越慢，数据加载中，请稍候......</td>
    </tr>
    </tbody>
</table>
<div id="page" class="m-pagination"></div>

<div id="audio" style="display:none">声音播放</div>