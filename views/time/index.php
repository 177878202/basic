<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caijis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caiji-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Caiji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'type',
//            'qihao',
//            'time_by',
//            'interval_time',
//             'switch',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
</div>
