<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '算法选择';
$this->params['breadcrumbs'][] = ['label' => '走势图', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '数据选择', 'url' => ['more']];
$this->params['breadcrumbs'][] = $this->title;
//dd(Yii::$app->request->get('type'));
//dd($type->name);
?>
<div class="algorithm-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'style',
//            'name',
//            'status',
            [
//                'attribute' => 'name',
                'value' =>  function ($data) use ($type) {
                    return $type->name.$data->style.$data->name;

                },
//                'format' => "raw"
            ],
            [
//                'attribute' => 'name',
                'value' => function ($data) {
                    return '<a href="'.Url::to(['zst/view','type'=>Yii::$app->request->get('type'),'algorithm'=>$data['id']]).'">走势图</a>'; // 如果是数组数据则为 $data['name'] ，例如，使用 SqlDataProvider 的情形。
                },
                'format' => "raw"
            ],
            [
//                'attribute' => 'name',
                'value' => function ($data) {
                    return '<a href="'.Url::to(['zst/look','type'=>Yii::$app->request->get('type'),'list'=>10000,'tid'=>0,'algorithm'=>$data['id']]).'">K线图</a>'; // 如果是数组数据则为 $data['name'] ，例如，使用 SqlDataProvider 的情形。
                },
                'format' => "raw"
            ],
//            'count',
//            'type',
            // 'mod',
            // 'sum',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>