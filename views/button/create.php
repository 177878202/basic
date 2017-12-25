<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Button */

$this->title = '添加按钮';
$this->params['breadcrumbs'][] = ['label' => '走势图', 'url' => ['zst/index']];
$this->params['breadcrumbs'][] = ['label' => 'K线图', 'url' => ['kxt/index']];
$this->params['breadcrumbs'][] = ['label' => '按钮管理', 'url' => ['index','t'=>$t]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'a' => $a,
        'ba' => $ba,
    ]) ?>

</div>
