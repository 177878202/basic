<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '模式列表';
//$this->params['breadcrumbs'][] = ['label' => 'K线图', 'url' => ['kxt/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <ul class="nav nav-pills nav-justified ">

        <?php
        foreach ($model as $k){
            if($k['a']){
                echo(
                    '<li><a href="'.
                    Url::to(['list','t'=>$k['n']])
                    .'" type="button" class="btn btn-default">我的'.$k['a'].'方案</a></li>'
                );
            }else{
                echo(
                    '<li><a href="'.
                    Url::to(['list','t'=>$k['n']])
                    .'" type="button" class="btn btn-default">我的'.$k['n'].'方案</a></li>'
                );
            }

        }
        ?>
    </ul>
    <div class="btn-group btn-group-sm">

        <?php
//        foreach ($model as $k){
//           if($k['a']){
//               echo(
//                   '<a href="'.
//                   Url::to(['view','t'=>$k['n']])
//                   .'" type="button" class="btn btn-default">'.$k['a'].'</a>'
//               );
//           }else{
//               echo(
//                   '<a href="'.
//                   Url::to(['view','t'=>$k['n']])
//                   .'" type="button" class="btn btn-default">'.$k['n'].'</a>'
//               );
//           }
//
//        }
        ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'uid',
            'n',
            's',
//            'i',
            't',
//            'b',
//            'd',
//            [
//                'contentOptions' => function ($data) {
//                    return ['style'=>'background-color:'.$data->b];
//                },
//                'attribute' => 'b',
//                'format' => 'raw'
//            ],
//            [
//                'contentOptions' => function ($data) {
//                    return ['style'=>'background-color:'.$data->d];
//                },
//                'attribute' => 'd',
//                'format' => 'raw'
//            ],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => '{update} {delete}'
//            ],
        ],
    ]); ?>
</div>
