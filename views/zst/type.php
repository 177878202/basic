<?php

use yii\helpers\Html;
//use yii\web\UrlManager;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//echo \yii\helpers\Json::encode($dataProvider);
//exit;
$this->title = '数据选择';
$this->params['breadcrumbs'][] = ['label' => '走势图', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caiji-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'type',
//            'time_by',
//            'interval_time:datetime',
            // 'switch',
//             'name',
            [
                'attribute' => 'name',
                'value' => function ($data) {
//        dd($data)
                    return '<a href="'.Url::to(['','type'=>$data['type']]).'">'.$data['name'].'</a>'; // 如果是数组数据则为 $data['name'] ，例如，使用 SqlDataProvider 的情形。
                },
                'format' => "raw"
            ],

//            'qihao',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>