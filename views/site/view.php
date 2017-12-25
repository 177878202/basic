<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '个人中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改资料', ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('修改密码', ['reset-password','token'=>''], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'mobile',
            'qq',
            'alipay',
            'money',
            //'status',
            'created_at',
            'updated_at',
            'vipdated_at',
        ],
    ]) ?>

</div>
