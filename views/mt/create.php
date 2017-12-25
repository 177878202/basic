<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Caiji;
use app\models\Algorithm;


/* @var $this yii\web\View */
/* @var $model app\models\Button */

$this->title = '添加'.$t.'方案';
$this->params['breadcrumbs'][] = ['label' => '模式测试', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '我的'.$t.'方案', 'url' => ['list','t'=>$t]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="button-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-3 column">

                    <?= $form->field($model, 'n') ?>
                </div>
                <div class="col-md-7 column">
                    <div class="row clearfix">
                        <div class="col-md-4 column">
                            <?= $form->field($model, 'd')->dropDownList(
                                Caiji::find()
                                    ->select(['name','id'])
                                    ->where(['switch'=>0])
                                    ->indexBy('id')
                                    ->column(),
                                ['prompt' => '请选择']) ?>

                        </div>

                        <div class="col-md-4 column">

                            <?php
                            $model->d&&$model_d=Caiji::findOne($model->d);

                            if($model->d&&$model_d){
                                echo(
                                $form->field($model, 'a')->dropDownList(

                                Algorithm::find()
                                    ->select(['name','id'])
                                    ->where(['and',['type'=>$model_d->t,'style'=>$t]])
                                    ->indexBy('id')
                                    ->column()
                                    ,
                                    ['prompt' => '请选择'])
                                );
                            }else{
                                echo(
                                    $form->field($model, 'a')->dropDownList(
                                        []
                                        ,
                                        ['prompt' => '请选择'])
                                );
                            }
                            ?>


                        </div>
                        <div class="col-md-4 column">
                            <?= $form->field($model, 's') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 column">
                    <?= $form->field($model, 'h') ?>
                </div>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'm') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php
$js = '
//分类
$("#plan-d").change(function() {
  var dId = $(this).val();//获取一级目录的值
//  alert(dId);
//  $("#plan-a").html("<option>当前数据没有算法</option>");//二级显示目录标签
    if (dId > 0) {
    geta(dId);//查询二级目录的方法
  }
});
  
function geta(dId){
  var href = "'.\yii\helpers\Url::to(['option']).'";//请求的地址
  $.ajax({
    "type" : "GET",
    "url"  : href,
    "data" : {dId : dId,t:'.$t.'},//所需参数和类型
    success : function(d) {
      $("#plan-a").html(d);//返回值输出
    }
  });
}

  
';
$this->registerJs($js);
