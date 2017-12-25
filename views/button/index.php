<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '按钮管理';
$this->params['breadcrumbs'][] = ['label' => '走势图', 'url' => ['zst/index']];
$this->params['breadcrumbs'][] = ['label' => 'K线图', 'url' => ['kxt/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加按钮', ['create','t'=>$t], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'uid',
            'n',
            'c',
            'i',
            't',
//            'b',
//            'd',
            [
                'contentOptions' => function ($data) {
                    return ['style'=>'background-color:'.$data->b];
                    },
                'attribute' => 'b',
                'format' => 'raw'
            ],
            [
                'contentOptions' => function ($data) {
                    return ['style'=>'background-color:'.$data->d];
                    },
                'attribute' => 'd',
                'format' => 'raw'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
