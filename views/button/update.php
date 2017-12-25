<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Button */

$this->title = '修改按钮: ' . $model->n;
$this->params['breadcrumbs'][] = ['label' => '走势图', 'url' => ['zst/index']];
$this->params['breadcrumbs'][] = ['label' => 'K线图', 'url' => ['kxt/index']];
$this->params['breadcrumbs'][] = ['label' => '按钮管理', 'url' => ['index','t'=>$t]];
//$this->params['breadcrumbs'][] = ['label' => $model->n, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="button-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'a' => $a,
        'ba' => $ba,
    ]) ?>

</div>
