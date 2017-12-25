<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我的'.$t.'方案';
$this->params['breadcrumbs'][] = ['label' => '模式测试', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加方案', ['create','t'=>$t], ['class' => 'btn btn-success']) ?>
    </p>

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
