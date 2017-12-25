<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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


//$this->registerCssFile('@web/css/jquery.pagination.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/common.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/kxt.css' , ['depends' => 'app\assets\AppAsset']);
$this->registerCssFile('@web/css/button.css' , ['depends' => 'app\assets\AppAsset']);
//$this->registerCssFile('@web/css/'.$model->algorithmarr['style'].'.css' , ['depends' => 'app\assets\AppAsset']);


//$this->registerJsFile('@web/js/jquery.pagination-1.2.7.min.js' , ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('@web/js/common.js' , ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js' , ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('@web/js/kxt.js' , ['depends' => 'app\assets\AppAsset']);

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
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <?= Html::beginForm(['addlink','tid'=>$model->tid,'type'=>$model->type,'algorithm'=>$model->algorithm], 'post',['class' =>'navbar-form  navbar-right']) ?>
                <?= Html::input('text', 'title', Html::decode($this->title), ['class' => 'form-control','placeholder'=>'收藏链接的标题']) ?>
                <?= Html::submitButton($add_link_btn, ['class' => 'btn btn-default']) ?>
                <?= Html::endForm()?>
                <div class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="要统计多少期？" id="input_list" onkeydown="if(event.keyCode===13){o()}"/>
                        <button type="button" class="btn btn-default" onclick="o()">Go</button>
                    </div>
                </div>


            </div>
        </nav>
    </div>
</div>


<div class="col-md-12 column">
    <div class="form-inline" role="form">
        <div class="form-group">
            <label class="label label-info"  for="name">选择需要包含的数值以添加临时分组</label>
            <input type="text" class="form-control" id="tem_title" placeholder="请输入名称">
        </div>
        <button type="submit" class="btn btn-default" onclick="ke()">添加</button>
    </div>
    <div>

        <ul class='tg-list'  id="tem_button">
        </ul>
    </div>
</div>


<div class="col-md-12 column">
    <ul class='tg-list'  id="button">
    </ul>

</div>
<div class="col-md-12 column" id="container" style="height: 400px">
</div>


<div class="col-md-12 column" id="log">

</div>
