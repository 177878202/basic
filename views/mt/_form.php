<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->registerCssFile('@web/css/button.css' , ['depends' => 'app\assets\AppAsset']);
/* @var $this yii\web\View */
/* @var $model app\models\Button */
/* @var $form yii\widgets\ActiveForm */
//dd($a);
?>

<div class="button-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'n')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'a',['template' => "{label}<ul class='tg-list'>{input}</ul>{error}"])
        ->checkboxList(
            array_flip($a),
                ['item'=>function($index, $label, $name, $checked, $value){
        $checkStr = $checked?"checked":"";
        return '<li class=\'tg-list-item\'>
                <input type="checkbox" name="'.$name.'" id="cb'.$value.'" value='.$value.' '.$checkStr.' class=\'tgl tgl-skewed\' >
                <label class=\'tgl-btn\' data-tg-off='.$value.' data-tg-on='.$value.' for="cb'.$value.'"></label>
                
                </li>';
    },'itemOptions'=>['class'=>'myClass']]); ?>

    <?= $form->field($model, 'b',['template' => "{label}<ul class='tg-list'>{input}</ul>{error}"])
        ->radioList(
            array_flip($ba),
            ['item'=>function($index, $label, $name, $checked, $value){
                $checkStr = $checked?"checked":"";
                return '<li class=\'tg-list-item\'>
                <input type="radio" name="'.$name.'" id="bb'.$value.'" value='.$value.' '.$checkStr.' class=\'tgl tgl-skewed\' >
                <label class=\'tgl-btn\' data-tg-off="" data-tg-on='.$value.' for="bb'.$value.'"  style="background-color:'.$value.'"></label>
                
                </li>';
            },'itemOptions'=>['class'=>'myClass']]); ?>

    <?= $form->field($model, 'd',['template' => "{label}<ul class='tg-list'>{input}</ul>{error}"])
        ->radioList(
            array_flip($ba),
            ['item'=>function($index, $label, $name, $checked, $value){
                $checkStr = $checked?"checked":"";
                return '<li class=\'tg-list-item\'>
                <input type="radio" name="'.$name.'" id="dd'.$value.'" value='.$value.' '.$checkStr.' class=\'tgl tgl-skewed\' >
                <label class=\'tgl-btn\' data-tg-off="" data-tg-on='.$value.' for="dd'.$value.'"  style="background-color:'.$value.'"></label>
                
                </li>';
            },'itemOptions'=>['class'=>'myClass']]); ?>

    <?= $form->field($model, 'i')->textInput() ?>


<!--    --><?php //echo $form->field($model, 'd')->dropDownList(['28'=>'28','16'=>'16','11'=>'11','10'=>'10','36'=>'36'], ['prompt'=>'请选择']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
